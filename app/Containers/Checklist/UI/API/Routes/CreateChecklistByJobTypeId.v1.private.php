<?php

/**
 * @apiGroup           Checklist
 * @apiName            createChecklistByJobTypeId
 *
 * @api                {POST} /v1/job-types/:id/checklists Endpoint title here..
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
$router->post('job-types/{id}/checklists', [
    'as' => 'api_checklist_create_checklist_by_job_type_id',
    'uses'  => 'Controller@createChecklistByJobTypeId',
    'middleware' => [
      'auth:api',
    ],
]);
