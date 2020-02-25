<?php

/**
 * @apiGroup           Checklist
 * @apiName            checklistsByJobTypeId
 *
 * @api                {JOB-TYPES/{ID}/CHECKLISTS} /v1/job-types/:id/checklists Endpoint title here..
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
$router->post('job-types/{id}/checklists/tree', [
    'as' => 'api_checklist_checklists_by_job_type_id',
    'uses'  => 'Controller@checklistsByJobTypeId',
    'middleware' => [
      'auth:api',
    ],
]);
