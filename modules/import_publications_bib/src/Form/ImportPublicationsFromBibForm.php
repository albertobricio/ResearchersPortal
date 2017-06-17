<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 15/06/2017
 * Time: 19:27
 */

namespace Drupal\import_publications_bib\Form;

use Drupal\bibcite\Plugin\BibciteFormatManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ImportPublicationsFromBibForm extends ConfigFormBase {

  /**
   * Bibcite format manager service.
   *
   * @var \Drupal\bibcite\Plugin\BibciteFormatManagerInterface
   */
  protected $formatManager;

  /**
   * Serializer service.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serializer;

  /**
   * Import form constructor.
   *
   * @param \Symfony\Component\Serializer\SerializerInterface $serializer
   *   Import plugins manager.
   * @param \Drupal\bibcite\Plugin\BibciteFormatManagerInterface $format_manager
   *   Bibcite format manager service.
   */
  public function __construct(SerializerInterface $serializer, BibciteFormatManagerInterface $format_manager) {
    $this->serializer = $serializer;
    $this->formatManager = $format_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('serializer'),
      $container->get('plugin.manager.bibcite_format')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bibcite_import';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['file'] = [
      '#type' => 'file',
      '#title' => $this->t('Fichero'),
      '#multiple' => FALSE,
    ];
    $form['format'] = [
      '#type' => 'select',
      '#title' => $this->t('Format'),
      '#options' => array_map(function($definition) {
        return $definition['label'];
      }, $this->formatManager->getImportDefinitions()),
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Importar publicaciones'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $all_files = $this->getRequest()->files->get('files', []);
    if (!empty($all_files['file'])) {
      /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file_upload */
      $file_upload = $all_files['file'];
      if ($file_upload->isValid()) {
        $form_state->setValue('file', $file_upload->getRealPath());
        return;
      }
    }
    else {
      $form_state->setErrorByName('file', $this->t('The file could not be uploaded.'));
    }

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $data = file_get_contents($form_state->getValue('file'));
    $format_id = $form_state->getValue('format');
    /** @var \Drupal\bibcite\Plugin\BibciteFormatInterface $format */
    $format = $this->formatManager->createInstance($format_id);

    $decoded = $this->serializer->decode($data, $format->getPluginId());

    for($i=0; $i < sizeof($decoded); $i++)
    {
      if($this->isPublication($decoded[$i]['type']))
      {
        $this->createPublication($decoded[$i]);
      }
    }
    drupal_set_message('Publicaciones importadas con éxito!');
  }

  private function isPublication($type)
  {
    return $type == "article";
  }

  private function createPublication($article)
  {
    $data = array(
      'type' => 'publicacion',
      'title' => $article['title'],
      'field_titulo' => $article['title'],
      'field_autores' => $this->getPublicationAuthors($article['author']),
      'field_revista_congreso' => $article['journal'].PHP_EOL.$article['note'],
      'field_volumen' => intval($article['volume']),
      'field_numero' => intval($article['number']),
      'field_paginas' => $article['pages'],
      'field_ano' => $article['year'],
      'field_isbn_issn' => $article['issn'],
      'field_doi' => $article['doi'],
      'field_abstract' => $article['abstract'],
    );

    $node = \Drupal::entityManager()
      ->getStorage('node')
      ->create($data);
    $node->save();
  }

  private function getPublicationAuthors($authorList)
  {
    $authors = '';
    for($i = 0; $i < sizeof($authorList); $i++)
    {
      $authors .= $authorList[$i]." ".PHP_EOL;
    }
    return $authors;
  }

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames() {
    // TODO: Implement getEditableConfigNames() method.
  }
}
