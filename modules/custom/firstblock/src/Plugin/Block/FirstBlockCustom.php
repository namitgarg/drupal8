<?php
namespace Drupal\FirstBlock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'First block' Block
 *
 * @Block(
 *   id = "first_block",
 *   admin_label = @Translation("First block"),
 * )
 */

class FirstBlockCustom extends BlockBase {
  
  
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return array(
      'block_default_string' => $this->t('Default Text'),
      'block_second_field' => $this->t("second field"),
    );
  }
  
  
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['custom_string_text'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Block contents'),
      '#description' => $this->t('This text will appear in the example block.'),
      '#default_value' => $this->configuration['block_default_string'],
    );
    $form['custom_second_text'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Block second fields'),
      '#description' => $this->t('This text will appear in the example block.'),
      '#default_value' => $this->configuration['block_second_field'],
    );
    
    
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_default_string']
      = $form_state->getValue('custom_string_text');
  }
  
  /**
   * {@inheritdoc}
   */
   public function build() {
     
     
     $block_element=array();
    $block_element['first_field']=array(
      '#type' => 'markup',
      '#markup' => $this->configuration['block_default_string'],
    );
    $block_element['second_field']=array(
      '#type' => 'markup',
      '#markup' => $this->configuration['block_second_field'],
    );
    return $block_element;
     
//    return array(
//      '#markup' => $this->configuration['block_default_string'],
//    );
  }
}