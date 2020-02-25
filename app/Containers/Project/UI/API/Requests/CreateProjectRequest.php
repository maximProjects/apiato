<?php

namespace App\Containers\Project\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateProjectRequest.
 */
class CreateProjectRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Project\Data\Transporters\CreateProjectTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => 'create-projects',
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
        // 'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
   //         'property_owner_information' => 'max:100'
            // 'id' => 'required',
            // '{user-input}' => 'required|max:255',
//            'name' => 'required|min:2|max:200',
//            'state_id' => 'required',
//            'price_per_hour' => 'required',
//            'price_per_hour_extra' => 'required',
//            'working_hours_planned' => 'required',
//            'budget_planned' => 'required',
//            'working_hours_from' => 'required',
//            'working_hours_to' => 'required',
//            'date_start' => 'required|date',
//            'date_end' => 'required|date',
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
