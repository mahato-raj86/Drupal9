<?php
namespace Drupal\step_in_d9\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;


class LoginRouteSubscriber extends RouteSubscriberBase{
    /**
     * {@inheritdoc}
     */
    protected function alterRoutes(RouteCollection $collection){
        // Change path '/user/login' to '/customn-login'.
        if($route == $collection->get('user.login')){
            $route->setPath('/login');
        }

    }
}