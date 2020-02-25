<?php

namespace App\Containers\Company\UI\API\Transformers;

use App\Containers\Company\Models\Company;
use App\Ship\Parents\Transformers\Transformer;

class CompanyTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Company $entity
     *
     * @return array
     */
    public function transform(Company $entity)
    {
        $response = [
            'object' => 'Company',
            'id' => $entity->getHashedKey(),
            'name' => $entity->name,
            'company_code' => $entity->company_code,
            'vat_code' => $entity->vat_code,
            'address' => $entity->address,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
