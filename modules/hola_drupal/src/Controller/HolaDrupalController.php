<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 16/05/2017
 * Time: 19:38
 */
namespace Drupal\hola_drupal\Controller;
class HolaDrupalController {
  public function sayHello() {
    $content = [
      '#markup' => '<p><b>Hola Drupal!</b>. Este es mi primer modulo de Drupal.</p>',
    ];
    return $content;
  }
}