<?php

namespace App\Containers\Expense\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ExpenseRepository
 */
class ExpenseRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

//    public function create(array $data)
//    {
//
//        $arrPhotos = new Collection();
//
//        foreach ($data as $_data)
//        {
//            $media = Media::find($_data['media_id']);
//
//            $photo = parent::create($_data);
//            $photo->media()->save($media);
//
//            $arrPhotos->add($photo);
//        }
//
//        return $arrPhotos;
//    }
}
