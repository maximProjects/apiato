<?php

/**
 * @apiGroup           Company
 * @apiName            createCompany
 *
 * @api                {POST} /v1/companies Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('companies', [
    'as' => 'api_company_create_company',
    'uses'  => 'Controller@createCompany',
    'middleware' => [
      'auth:api',
    ],
]);
