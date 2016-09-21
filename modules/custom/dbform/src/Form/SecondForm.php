<?php

namespace Drupal\dbform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class SecondForm extends FormBase {

  public function getFormId() {
    return 'secondform_db';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $options = array('male' => 'Male', 'female' => 'Female');
    $form['name'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("name"),
      '#description' => t("Enter Your name"),
    );
    $form['age'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t("Age"),
      '#description' => t("Enter Your Age"),
    );
    $form['sex'] = array(
      '#type' => 'select',
      '#options' => $options,
      '#required' => TRUE,
      '#title' => t("Sex"),
      '#description' => t("Select Your Sex"),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t("Search"),
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $age = $form_state->getValue('age');
    if (!is_numeric($age)) {
      $form_state->setErrorByName('age', $this->t('Enter Numerical digits only'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

$fields = array(
    'name' => $form_state->getValue('name'),
    'age' => $form_state->getValue('age'),
    'sex' => $form_state->getValue('sex'),
  );
  db_insert('dbform')
      ->fields($fields)
      ->execute();
    drupal_set_message($this->t('You Searched  for me'));
    
    
     $query=db_select('dbform','db')
     ->fields('db',array('name','age','sex'));
     $results = $query->execute()->fetchAll();
     print_r($results);
     die;
  }
}
