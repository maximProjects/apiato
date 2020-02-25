<?php

namespace App\Containers\Attachment\Data\Repositories;

use App\Containers\Attachment\Models\Attachment;
use App\Ship\Parents\Repositories\Repository;

/**
 * Class AttachmentRepository
 */
class AttachmentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];


    public function create(array $data)
    {

        $attachment = Attachment::create($data);

        return $attachment;
    }
}
