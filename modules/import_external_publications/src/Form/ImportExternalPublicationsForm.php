<?php

/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 17/06/2017
 * Time: 9:19
 */

namespace Drupal\import_external_publications\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ImportExternalPublicationsForm extends ConfigFormBase{

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

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'import_external_publications_admin_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['query'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Introduzca su búsqueda:'),
      '#size' => 60,
      '#maxlength' => 128,
    );

    $form['search'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Buscar publicaciones'),
      '#name' => 'SearchPublications'
    );

    $form['import'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Importar publicaciones'),
      '#name' => 'ImportPublications'
    );

    $header = [
      '#title' => $this->t('Título'),
      '#authors' => $this->t('Autores'),
      '#venue' => $this->t('Revista/Congreso'),
      '#volume' => $this->t('Volumen'),
      '#number' => $this->t('Número'),
      '#pages' => $this->t('Páginas'),
      '#year' => $this->t('Año'),
    ];

    $form['table'] = array(
      '#type' => 'tableselect',
      '#header' => $header,
      '#empty' => $this->t('No se han encontrado publicaciones'),
      '#options' => $_SESSION['options']
    );

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    if($form_state->getTriggeringElement()['#name'] == "SearchPublications")
    {
      $publications = $this->getExternalPublications($form['query']['#value']);
      $_SESSION['options'] = $publications;
      drupal_set_message("Publicaciones encontradas ...");
    }
    elseif ($form_state->getTriggeringElement()['#name'] == "ImportPublications")
    {
      $this->importCheckedPublications($form['table']);
      $_SESSION['options'] = [];
      drupal_set_message("Publicaciones importadas con éxito!");
    }
    else
    {
      drupal_set_message($form['query']['#value']);
    }
  }

  private function getExternalPublications($query)
  {
    //  Initiate curl
    $curl = curl_init();
    $url = "http://dblp.org/search/publ/api?q=".$query."&h=1000&format=json"; //DBLP API URL

    // Disable SSL verification
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($curl, CURLOPT_URL, $url);
    // Execute
    $response = curl_exec($curl);
    // Closing
    curl_close($curl);

    // Will dump json
    $result = json_decode($response, true);
    $options = $this->getPublicationFields($result);
    return $options;
  }

  private function getPublicationFields($publications)
  {
    $authors = "";

    for ($i = 0; $i < sizeof($publications['result']['hits']['hit']); $i++)
    {
      $title = $publications['result']['hits']['hit'][$i]["info"]["title"];
      $venue = $publications['result']['hits']['hit'][$i]["info"]["venue"];
      $volume = $publications['result']['hits']['hit'][$i]["info"]["volume"];
      $number = $publications['result']['hits']['hit'][$i]["info"]["number"];
      $pages = $publications['result']['hits']['hit'][$i]["info"]["pages"];
      $year = $publications['result']['hits']['hit'][$i]["info"]["year"];
      for ($j = 0; $j < sizeof($publications['result']['hits']['hit'][$i]["info"]["authors"]["author"]); $j++)
      {
        $authors .= $publications['result']['hits']['hit'][$i]["info"]["authors"]["author"][$j]." ".PHP_EOL;
      }
      $index = $i + 1;
      $options[$index]['#title'] = $title; //Required
      $options[$index]['#authors'] = $authors; //Required
      $venue != null ? $options[$index]['#venue'] = $venue : $options[$index]['#venue'] = "";
      $volume != null ? $options[$index]['#volume'] = $volume : $options[$index]['#volume'] = "";
      $number != null ? $options[$index]['#number'] = $number : $options[$index]['#number'] = "";
      $pages != null ? $options[$index]['#pages'] = $pages : $options[$index]['#pages'] = "";
      $year != null ? $options[$index]['#year'] = $year : $options[$index]['#year'] = "";
      $authors = "";
    }
    return $options;
  }

  private function importCheckedPublications($publications)
  {
    for ($i = 1; $i <= sizeof($publications['#options']); $i++)
    {
      if($publications[$i]['#checked'] == TRUE)
      {
        $this->importPublication($publications['#options'][$i]);
      }
    }
  }

  private function importPublication($publicationSelected)
  {
    $data = array(
      'type' => 'publicacion',
      'title' => $publicationSelected['#title'],
      'field_titulo' => $publicationSelected['#title'],
      'field_autores' => $publicationSelected['#authors'],
      'field_revista_congreso' => $publicationSelected['#venue'],
      'field_volumen' => $publicationSelected['#volume'],
      'field_numero' => $publicationSelected['#number'],
      'field_paginas' => $publicationSelected['#pages'],
      'field_ano' => $publicationSelected['#year'],
    );

    $node = \Drupal::entityManager()
      ->getStorage('node')
      ->create($data);
    $node->save();
  }

}
?>