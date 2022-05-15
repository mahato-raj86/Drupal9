<?php
/**
 * 
 * @file
 * Contains Drupal\recaptcha_config_form\RecaptchaSettingForm.
 */
namespace Drupal\recaptcha_config_form\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

Class RecaptchaSettingForm extends ConfigFormBase
{
    /**
     * {@inheritdoc}
     */
    public function getEditableConfigNames(){
        return [
            'recaptcha_config_form.recaptcha_setting',
          ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId(){
        return 'recaptcha_setting_form';//a unique identifier 
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state){
        $config = $this->config('recaptcha_config_form.recaptcha_setting');
        $form['recaptcha_site_key'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('SITE KEY'),
            '#description' => $this->t('Use this site key in the HTML code your site serves to users.'),
            '#default_value' => $config->get('recaptcha_site_key'),
        );
        
        $form['recaptcha_secret_key'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('SECRET KEY'),
            '#description' => $this->t('Use this secret key for communication between your site and reCAPTCHA.'),
            '#default_value' => $config->get('recaptcha_secret_key'),
        );
        return parent::buildForm($form,$form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state){
        parent::validateForm($form,$form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state){
        

        $config = $this->config('recaptcha_config_form.recaptcha_setting');
        $config->set('recaptcha_site_key', $form_state->getValue('recaptcha_site_key'));
        $config->set('recaptcha_secret_key', $form_state->getValue('recaptcha_secret_key'));
        $config->save();

        parent::submitForm($form,$form_state);
    }
}
