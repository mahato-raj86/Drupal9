<?php
namespace Drupal\step_in_d9\Plugin\rest\resource;

use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
/**
* Provides a resource to get view modes by entity and bundle.
*
* @RestResource(
*   id = "rest_sample",
*   label = @Translation("Step in d9 sample rest"),
*   uri_paths = {
*     "canonical" = "/rest/step_in_d9/api/get/node/{type}"
*   }
* )
*/

Class RestSample extends ResourceBase{
    /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function get($type = NULL) {
 
    // You must to implement the logic of your REST Resource here.
     $data = ['message' => 'Hello, this is a rest service and parameter is: '.$type];
         
     $response = new ResourceResponse($data);
     // In order to generate fresh result every time (without clearing 
     // the cache), you need to invalidate the cache.
     $response->addCacheableDependency($data);
     return $response;
   }
}