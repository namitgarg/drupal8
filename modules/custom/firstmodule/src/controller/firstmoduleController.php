<?php
/**
 * @file
 * Contains \Drupal\firstmodule\Controller\firstmodulecontroller.
 */

namespace Drupal\firstmodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class firstmoduleController extends ControllerBase {
  public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Hello, World!'),
    );
  }
}