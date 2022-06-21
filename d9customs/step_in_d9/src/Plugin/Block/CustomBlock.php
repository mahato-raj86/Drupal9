<?php
namespace Drupal\step_in_d9\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *  id="custom_block",
 *  admin_label = @Translation("Step in D9 Block"),
 *  category = @Translation("Step in D9"),
 * )
 */
Class CustomBlock extends BlockBase{

    /**
     * {@inheritdoc}
     */
    public function build(){
        $html = "I have $". rand(400,60000)." in my posket.";
        return [
            '#theme' => 'step_in_d9_block',
            '#data' => ['age' => rand(1,60)],
            '#markup' => $html,
            '#cache'    =>[
                'tags'  =>[
                    //'node:1',
                    'node_list',
                ],
                'contexts' => [
                    'url',
                    'route',
                    'user.permissions',
                ],
                'max-age'    => 10
            ]
        ];
    }
}