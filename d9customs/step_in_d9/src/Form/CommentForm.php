<?php
/**
 * @file
 * contains Drupal\step_in_d9\Form\CommentForm
 */

namespace Drupal\step_in_d9\Form;

use Symfony\Component\Dependency\Injection\ContainerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Egulias\EmailValidator\EmailValidator;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Messenger\MessengerInterface;

Class CommentForm extends FormBase{
    /**
     * Email Validator
     * @var Egulias\EmailValidator\EmailValidator
     */
    protected $account;
    protected $emailvalidator;
    protected $messenger;

    
    /**
     * {@inheritdoc}
     */
    public function getFormId(){
        return "step_in_d9.comment_form";// a unique identifier
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form,FormStateInterface $form_state){
        $form['comment'] = array(
            '#type' => 'textarea',
            '#title'    =>  t('Comment'),
            '#required' =>  TRUE,
        );
        $form['name'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('Name'),
            '#required' =>  TRUE,
        );
        $form['email'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('Email'),
            '#required' =>  TRUE,
        );
        $form['website'] = array(
            '#type' => 'textfield',
            '#title'    =>  t('Website'),
            
        );

        $form['notify_me'] = array(
            '#type' => 'checkbox',
            '#title'    =>  t('Notify me of new post'),
            
        );

        $form['actions']['#type'] = "actions";
        $form['actions']['submit'] = array(
            '#type' =>  'submit',
            '#value'    =>  $this->t('Comment'),
            '#button_type'  =>  'primary',
        );

        return $form;

    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state){
        $value = $form_state->getValue('email');
        // if($value == !\Drupal::service('email.validator').isValid($value)){
        //     $form_state->setErrorByName('email',t('email : %email is not valid',array('%email'=>$value)));
        //     return;
        // }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state){
        $current_user = \Drupal::currentUser();
        if($current_user){
            \Drupal::messenger()->adddMessage(t('Submitted by login user'));
        }else{
            \Drupal::messenger()->adddMessage(t('Submitted by anonymous user'));
        }
        \Drupal::messenger()->addMessage(t("Thanks for contacting us we will get back to you soon."));
        foreach ($form_state->getValues() as $key => $value) {
        \Drupal::messenger()->addMessage($key . ': ' . $value);
        }
    }
}
