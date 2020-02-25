<?php

/**
 * @apiGroup           Checklist
 * @apiName            getChecklistsByJobTypeId
 *
 * @api                {GET} /v1/job-types/:id/checklists Endpoint title here..
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
$router->get('job-types/{id}/checklists', [
    'as' => 'api_checklist_get_checklists_by_job_type_id',
    'uses'  => 'Controller@getChecklistsByJobTypeId',
    'middleware' => [
      'auth:api',
    ],
]);
