<?php

namespace Drupal\certbot\Controller;

use Drupal\Core\Controller\ControllerBase;

use Symfony\Component\HttpFoundation\Response;

/**
 * Defines HelloController class.
 */

class ExportController extends ControllerBase
{
  public function generate_result($cert_key)
  {
    $query = \Drupal::entityQuery('node')
      ->accessCheck(TRUE)
      ->condition('type', 'certificates')
      ->condition('field_cert_key',$cert_key);

    $entity_ids = $query->execute();
    $certificates = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($entity_ids);

    foreach($certificates as $cert){

      $cert_content_file = $cert->field_cert_content_file->value;
      $response = new Response($cert_content_file);
      $response->headers->set('Content-Type', 'text/html');
      return $response;
    }

    $response = new Response("Cert does not exist");
    $response->headers->set('Content-Type', 'text/html');
    return $response;

  }
}
