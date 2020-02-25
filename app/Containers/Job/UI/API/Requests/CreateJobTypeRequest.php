<?php

namespace App\Containers\Job\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateJobTypeRequest.
 */
class CreateJobTypeRequest extends Request
{
    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\JobType\Data\Transporters\CreateJobTypeTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => 'create-job-types',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
         //'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            //'name' => 'required|min:2|max:200',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
