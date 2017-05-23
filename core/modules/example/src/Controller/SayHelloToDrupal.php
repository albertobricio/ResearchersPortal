<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 16/05/2017
 * Time: 19:38
 */
namespace Drupal\example\Controller;
use Drupal\Core\Controller\ControllerBase;

class SayHelloToDrupal extends ControllerBase {
  public function sayHello() {
    $content = [
      '#markup' => '<p><b>Hola Drupal!</b>. Este esmi primer modulo de Drupal.</p>',
    ];
    return $content;
  }

  public function content(){
    return array(
      '#type'=>'markup',
      '#markup'=>$this->t('Hello this is a dynamic route'),
    );
  }
}