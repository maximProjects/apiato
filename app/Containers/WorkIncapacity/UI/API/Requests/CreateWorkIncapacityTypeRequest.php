<?php

namespace App\Containers\WorkIncapacity\UI\API\Requests;

use App\Containers\WorkIncapacity\Data\Transporters\CreateWorkIncapacityTypeTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateWorkIncapacityTypeRequest.
 */
class CreateWorkIncapacityTypeRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = CreateWorkIncapacityTypeTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => 'create-workincapacitytypes',
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
            'name' => 'required',
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
