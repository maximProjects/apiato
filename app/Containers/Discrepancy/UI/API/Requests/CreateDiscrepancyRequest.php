<?php

namespace App\Containers\Discrepancy\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateDiscrepancyRequest.
 */
class CreateDiscrepancyRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Discrepancy\Data\Transporters\CreateDiscrepancyTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => 'create-discrepancities',
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
//            'state_id' => 'required',
//            'project_id' => 'required',
//            'type_id' => 'required',
//            'price_per_hour' => 'required',
//            'price_per_hour_extra' => 'required',
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
