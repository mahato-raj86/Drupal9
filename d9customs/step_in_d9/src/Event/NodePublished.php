<?php

namespace Drupal\step_in_d9\Event;

use Drupal\Node\NodeInterface;
use Symfony\Component\EventDispatcher\Event;

Class NodePublished extends Event{
    const EVENT_NAME = "author_info";

    /**
     * the node object
     * @var Drupal\Node\NodeInterface.
     */
    public $node;

    /**
     * construct the object
     * @param Drupal\Node\NodeInterface $node
     * The node object created
     */
    public function __construct(NodeInterface $node){
        //$this->$node = $node;
        \Drupal::messenger()->addStatus(t('Node %title is published by %author',[
            '%title' => $node->getTitle(),
            '%author' => $node->getOwner()->getDisplayName(),
        ]));
    }
}