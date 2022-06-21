<?php
/**
 *  @file
 *  Contains Drupal\step_in_d9\Form\SettingsForm.
 */
namespace Drupal\step_in_d9\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *  Class SettingsForm
 *  @package Drupal\step_in_d9\Form
 */

Class SettingsForm extends ConfigFormBase{
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'step_in_d9.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('step_in_d9.settings');
    $form['bio'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Bio'),
      '#default_value' => $config->get('bio'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('step_in_d9.settings')
      ->set('bio', $form_state->getValue('bio'))
      ->save();
  }

}