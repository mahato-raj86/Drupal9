<?php
namespace Drupal\step_in_d9\EventSubscriber;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

Class ConfigSubscriber implements EventSubscriberInterface{

    /**
     * {@inheritdoc}
     * 
     * @return array
     * the event name to listen for and the method to be executed
     */
    public static function getSubscribedEvents(){
        return[
            ConfigEvents::SAVE => 'configSave',
            ConfigEvents::DELETE => 'configDelete',
        ];
    }

    /**
     * {@inheritdoc}
     * react  to a config object saved
     * @param \Drupal\Core\Config\ConfigCrudEvent $event
     * config crud event.
     */
    public function configSave(ConfigCrudEvent $event){
        $config = $event->getConfig();
        \Drupal::messenger()->addStatus($config->getName()." config event is saved successfully");
    }

    /**
     * {@inheritdoc}
     * react  to a config object saved
     * @param \Drupal\Core\Config\ConfigCrudEvent $event
     * config crud event.
     */
    public function configDelete(ConfigCrudEvent $event){
        $config = $event->getConfig();
        \Drupal::messenger()->addStatus($config->getName()." config event is deleted successfully");
    }
}
