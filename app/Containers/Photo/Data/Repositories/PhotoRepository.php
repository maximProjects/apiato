<?php

namespace App\Containers\Photo\Data\Repositories;

use App\Containers\Media\Models\Media;
use App\Ship\Parents\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PhotoRepository
 */
class PhotoRepository extends Repository
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

        $arrPhotos = new Collection();

        foreach ($data as $_data)
        {
            $media = Media::find($_data['media_id']);

            $photo = parent::create($_data);
            $photo->media()->save($media);

            $arrPhotos->add($photo);
        }

        return $arrPhotos;
    }

}
