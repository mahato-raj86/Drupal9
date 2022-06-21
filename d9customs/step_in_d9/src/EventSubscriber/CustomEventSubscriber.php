<?php
namespace Drupal\step_in_d9\EventSubscriber;

use Drupal\step_in_d9\Event\NodePublished;
use Drupal\Core\Config\ConfigEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

Class CustomEventSubscriber implements EventSubscriberInterface{

    /**
     * {@inheritdoc}
     * 
     * @return array
     * the event name to listen for and the method to be executed
     */
    public static function getSubscribedEvents(){
        return[
            NodePublished::EVENT_NAME => 'addCustomMessage',
        ];
    }

    public function addCustomMessage(NodePublished $node){
        \Drupal::messenger()->addMessage(t('Custom Event message : Node published'));
    }
}