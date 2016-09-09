<?php
/**
 * @file
 * Contains \Drupal\firstmodule\Controller\firstmodulecontroller.
 */

namespace Drupal\firstblock\Controller;

use Drupal\Core\Controller\ControllerBase;

class firstblockController extends ControllerBase {
  public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Hello,  Namit World!'),
    );
  }
}