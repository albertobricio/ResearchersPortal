<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 16/05/2017
 * Time: 19:38
 */
namespace Drupal\front_page_module\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class FrontPageController {

  public function content() {
    $view = file_create_url('public://View/etsisi-front-page.html');
    return new RedirectResponse($view);
  }
}