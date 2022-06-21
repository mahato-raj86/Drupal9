<?php
namespace Drupal\step_in_d9\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @Block(
 *  id = "custom_form_block",
 *  admin_label = @Translation("This is a custom form Block"),
 *  category = @Translation("Step in D9"),
 * )
 * 
 */
Class CusotmFormBlock extends BlockBase{
    

    /**
     *  {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state){
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();
    
        $form['custom_block_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Name'),
          '#description' => $this->t('Who do you want to say hello to?'),
          '#default_value' => $config['custom_block_name'] ?? '',
        ];
    
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state){
        parent::blockSubmit($form, $form_state);
        $values = $form_state->getValues();
        $this->configuration['custom_block_name'] = $values['custom_block_name'];
    }

    /**
     * {@inheritdoc}
     */
    public function blockValidate($form, FormStateInterface $form_state){
        if ($form_state->getValue('custom_block_name') === 'John') {
            $form_state->setErrorByName('custom_block_name', $this->t('You can not say hello to John.'));
        }
    }

}