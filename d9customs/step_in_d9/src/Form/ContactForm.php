<?php
/**
 * @file
 * Contains Drupal\step_in_d9\Form\ContactForm.
 */

namespace Drupal\step_in_D9\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

Class ContactForm extends FormBase{
    /**
     * {@inheritdoc}
     */
    public function getFormId(){
        return 'contact_form';//a unique identifier

    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, formStateInterface $form_state){
        $form['first_name'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('First Name'),
            '#description' => t('Enter your first name'),
            '#required' =>  TRUE,
        );

        $form['last_name'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('Last Name'),
            '#description' => t('Enter your last name'),
            '#required' =>  TRUE,
        );

        $form['company'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('Company'),
            '#description' => t('Enter your company'),
            '#required' =>  FALSE,
        );

        $form['query'] = array(
            '#type' => 'textarea',
            '#title'    =>  t('Query'),
            '#description' => t('Enter your query'),
            '#required' =>  TRUE,
        );

        $form['actions']['#type'] = "actions";
        $form['actions']['submit'] = array(
            '#type' =>  'submit',
            '#value'    =>  $this->t('Contact'),
            '#button_type'  =>  'primary',
        );

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, formStateInterface $form_state){
        
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, formStateInterface $form_state){
        \Drupal::messenger()->addMessage(t("Thanks for contacting us we will get back to you soon."));
        foreach ($form_state->getValues() as $key => $value) {
        \Drupal::messenger()->addMessage($key . ': ' . $value);
        }
    }
}