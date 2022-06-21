<?php
namespace Drupal\step_in_d9\Plugin\rest\resource;

use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * 
 * @RestResource(
 *      id = "rest_sample_post",
 *      label = @Translation("Step in d9 sample post resource"),
 *      uri_paths = {
 *          "create" = "/rest/step_in_d9/api/post/items"
 *      }
 * )
 * 
 */
Class RestSamplePost extends ResourceBase{
     /**
   * Responds to POST requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
    public function post($data){
        // You must to implement the logic of your REST Resource here.
        $data = ['message' => 'Hello, this is a rest service and parameter is: '.$data->name->value];
                
        $response = new ResourceResponse($data);
        // In order to generate fresh result every time (without clearing 
        // the cache), you need to invalidate the cache.
        $response->addCacheableDependency($data);
        return $response;

    }
}