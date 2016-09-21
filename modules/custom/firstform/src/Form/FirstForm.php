<?php

namespace Drupal\firstform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class firstform extends FormBase {

  public function getFormId() {
    return 'firstform_simple';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {


    $form['search_box'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Search"),
      '#default_value' => $intial_search,
      '#description' => t("Enter the text to be searched for"),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t("Search"),
    );
    return $form;
  }
  
  
  
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // @todo: Implement validateForm() method.
    $search = $form_state->getValue('search_box');
    if(!ctype_alpha($search) )
    {
       $form_state->setErrorByName('search_box', $this->t('only alphabets allowed'));

    }
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    $search = $form_state->getValue('search_box');
    drupal_set_message($this->t('You Searched  for @search', array('@search' => $search)));
    $form_state->setRedirect('firstblock.content');
    //firstblock.content is the router name
  }
  

}
