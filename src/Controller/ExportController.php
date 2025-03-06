<?php

namespace Drupal\your_module\Controller;

use Drupal\Core\Controller\ControllerBase;

use Symfony\Component\HttpFoundation\Response;

/**
 * Defines HelloController class.
 */

class ExportController extends ControllerBase
{
  public function update_config()
  {
    // Retrieve the configuration object.
    $config = \Drupal::config('your_config_name');

    // Update the value of a specific variable in the config.
    $config->set('your_variable_name', 'new_value')->save();

    // Output a message confirming the update.    
    $response = new Response("The configuration variable has been updated successfully.\n");
    $response->headers->set('Content-Type', 'text/html');
    return $response;

  }
}
