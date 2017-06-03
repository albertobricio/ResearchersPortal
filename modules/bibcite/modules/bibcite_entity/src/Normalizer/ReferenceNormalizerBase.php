<?php

namespace Drupal\bibcite_entity\Normalizer;

use Drupal\bibcite_entity\Entity\ReferenceInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\serialization\Normalizer\EntityNormalizer;

/**
 * Base normalizer class for bibcite formats.
 */
abstract class ReferenceNormalizerBase extends EntityNormalizer {

  /**
   * The format that this Normalizer supports.
   *
   * @var string
   */
  protected $format;

  /**
   * Default publication type. Will be assigned for types without mapping.
   *
   * @var string
   */
  protected $defaultType;

  /**
   * Mapping between bibcite_entity and format publication types.
   *
   * @var array
   */
  protected $typesMapping;

  /**
   * Mapping between bibcite_entity and format fields.
   *
   * @var array
   */
  protected $fieldsMapping;

  /**
   * The interface or class that this Normalizer supports.
   *
   * @var array
   */
  protected $supportedInterfaceOrClass = ['Drupal\bibcite_entity\Entity\ReferenceInterface'];

  /**
   * Configuration factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Format contributor key.
   *
   * @var string|null
   */
  protected $contributorKey = NULL;

  /**
   * Format keyword key.
   *
   * @var null|string
   */
  protected $keywordKey = NULL;

  /**
   * Format type key.
   *
   * @var null|string
   */
  protected $typeKey = NULL;

  /**
   * Construct new BiblioraphyNormalizer object.
   *
   * @param \Drupal\Core\Entity\EntityManagerInterface $entity_manager
   *   The entity manager.
   */
  public function __construct(EntityManagerInterface $entity_manager, ConfigFactoryInterface $config_factory) {
    parent::__construct($entity_manager);

    $this->configFactory = $config_factory;

    $config_name = sprintf('bibcite_entity.mapping.%s', $this->format);
    $config = $this->configFactory->get($config_name);

    $this->fieldsMapping = $config->get('fields');
    $this->typesMapping = $config->get('types');
  }

  /**
   * Get format contributor key.
   *
   * @return string|null
   *   Contributor key.
   */
  protected function getContributorKey() {
    return $this->contributorKey;
  }

  /**
   * Get format keyword key.
   *
   * @return string|null
   *   Keyword key.
   */
  protected function getKeywordKey() {
    return $this->keywordKey;
  }

  /**
   * Get format type key.
   *
   * @return string|null
   *   Type key.
   */
  protected function getTypeKey() {
    return $this->typeKey;
  }

  /**
   * {@inheritdoc}
   */
  public function denormalize($data, $class, $format = NULL, array $context = []) {
    $contributor_key = $this->getContributorKey();
    if (!empty($data[$contributor_key])) {
      if (!is_array($data[$contributor_key])) {
        $data[$contributor_key] = [$data[$contributor_key]];
      }

      foreach ($data[$contributor_key] as $key => $contributor_name) {
        // @todo Find a better way to set authors.
        $data[$contributor_key][$key] = $this->prepareAuthor($contributor_name, !empty($context['contributor_deduplication']));
      }
    }

    $keyword_key = $this->getKeywordKey();
    if (!empty($data[$keyword_key])) {
      if (!is_array($data[$keyword_key])) {
        $data[$keyword_key] = [$data[$keyword_key]];
      }

      foreach ($data[$keyword_key] as $key => $keyword) {
        // @todo Find a better way to set keywords.
        $data[$keyword_key][$key] = $this->prepareKeyword($keyword, !empty($context['keyword_deduplication']));
      }
    }

    $type_key = $this->getTypeKey();
    $data[$type_key] = $this->convertFormatType($data[$type_key]);
    $data = $this->convertKeys($data);

    return parent::denormalize($data, $class, $format, $context);
  }

  /**
   * Convert publication type to format type.
   *
   * @param string $type
   *   Bibcite entity publication type.
   *
   * @return string
   *   Format publication type.
   */
  protected function convertEntityType($type) {
    $types_mapping = [];

    foreach ($this->typesMapping as $format_type => $entity_type) {
      if (empty($entity_type) || isset($mapping[$entity_type])) {
        continue;
      }

      $types_mapping[$entity_type] = $format_type;
    }

    return isset($types_mapping[$type]) ? $types_mapping[$type] : $this->defaultType;
  }

  /**
   * Convert format type to publication type.
   *
   * @param string $type
   *   Format publication type.
   *
   * @return string|null
   *   Bibcite entity publication type.
   */
  protected function convertFormatType($type) {
    return isset($this->typesMapping[$type]) ? $this->typesMapping[$type] : NULL;
  }

  /**
   * Extract fields values from reference entity.
   *
   * @param \Drupal\bibcite_entity\Entity\ReferenceInterface $reference
   *   Reference entity object.
   *
   * @return array
   *   Array of entity values.
   */
  protected function extractFields(ReferenceInterface $reference) {
    $attributes = [];

    foreach ($this->fieldsMapping as $format_field => $entity_field) {
      if ($entity_field && $reference->hasField($entity_field) && ($field = $reference->get($entity_field)) && !$field->isEmpty()) {
        $attributes[$format_field] = $this->extractScalar($field);
      }
    }

    return $attributes;
  }

  /**
   * Extract keywords labels from field.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $field_item_list
   *   List of field items.
   *
   * @return array
   *   Keywords labels.
   */
  protected function extractKeywords(FieldItemListInterface $field_item_list) {
    $keywords = [];

    foreach ($field_item_list as $field) {
      $keywords[] = $field->entity->label();
    }

    return $keywords;
  }

  /**
   * Extract authors values from field.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $field_item_list
   *   List of field items.
   *
   * @return array
   *   Authors in BibTex format.
   */
  protected function extractAuthors(FieldItemListInterface $field_item_list) {
    $authors = [];

    foreach ($field_item_list as $field) {
      $authors[] = $field->entity->getName();
    }

    return $authors;
  }

  /**
   * Convert author name string to Contributor object.
   *
   * @param string $author_name
   *   Raw author name string.
   * @param bool $deduplicate
   *   Process deduplication.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   New contributor entity.
   */
  protected function prepareAuthor($author_name, $deduplicate = TRUE) {
    $storage = $this->entityManager->getStorage('bibcite_contributor');

    if (!$deduplicate) {
      return $storage->create(['name' => $author_name]);
    }

    $author_name_parsed = \Drupal::service('bibcite.human_name_parser')->parse($author_name);
    $query = $storage->getQuery()->range(0, 1);
    foreach ($author_name_parsed as $name_part => $value) {
      if (empty($value)) {
        $query->notExists($name_part);
      }
      else {
        $query->condition($name_part, $value);
      }
    }

    $entity = $storage->loadMultiple($query->execute());
    $entity = $entity ? reset($entity) : $storage->create(['name' => $author_name]);

    return $entity;
  }

  /**
   * Convert keyword string to Keyword object.
   *
   * @param string $keyword
   *   Keyword string.
   * @param bool $deduplicate
   *   Process deduplication.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   New keyword entity.
   */
  protected function prepareKeyword($keyword, $deduplicate = TRUE) {
    $storage = $this->entityManager->getStorage('bibcite_keyword');
    $label_key = $storage->getEntityType()->getKey('label');

    if (!$deduplicate) {
      return $storage->create([$label_key => trim($keyword)]);
    }

    $label_key = $storage->getEntityType()->getKey('label');
    $query = $storage->getQuery()
      ->condition($label_key, trim($keyword))
      ->range(0, 1)
      ->execute();

    $entity = $storage->loadMultiple($query);
    $entity = $entity ? reset($entity) : $storage->create([$label_key => trim($keyword)]);

    return $entity;
  }

  /**
   * Checks if the provided format is supported by this normalizer.
   *
   * @param string $format
   *   The format to check.
   *
   * @return bool
   *   TRUE if the format is supported, FALSE otherwise. If no format is
   *   specified this will return FALSE.
   */
  protected function checkFormat($format = NULL) {
    return isset($format, $this->format) && $format == $this->format;
  }

  /**
   * Extract scalar value.
   *
   * @param \Drupal\Core\Field\FieldItemListInterface $scalar_field
   *   Scalar items list.
   *
   * @return mixed
   *   Scalar value.
   */
  protected function extractScalar(FieldItemListInterface $scalar_field) {
    return $scalar_field->value;
  }

  /**
   * Convert format keys to Bibcite entity keys and filter non-mapped.
   *
   * @param array $data
   *   Array of decoded values.
   *
   * @return array
   *   Array of decoded values with converted keys.
   *
   * @todo This is a temporary solution. Normalizers and encodes must be revisited to avoid this dirty hack.
   */
  protected function convertKeys(array $data) {
    $converted = [];

    $system = ['type', 'author', 'keyword'];
    foreach ($data as $key => $field) {
      if (!empty($this->fieldsMapping[$key])) {
        $converted[$this->fieldsMapping[$key]] = !in_array($this->fieldsMapping[$key], $system) ? [$field] : $field;
      }
    }

    return $converted;
  }

}
