<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePhotoAction extends Action
{
    public function run(Request $request)
    {
        $files = $request->file();

        if($files)
        {
            $uploads = Apiato::call('Media@UploadMediaTask', [$files]);

            $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

            $arrMediaIds = array();

            $media->each(function ($item, $key) use (&$arrMediaIds) {
                $arrMediaIds[] = array(
                    'media_id' => $item->id,
                    'title' => '',
                    'description' => '',
                    'alt' => '',
                    'meta' => ''
                );
            });


            $photos = Apiato::call('Photo@CreatePhotoTask', [$arrMediaIds]);

        }else{

            $data = $request->get('documents');

            $photos = Apiato::call('Photo@CreatePhotoTask', [$data]);
        }


        return $photos;
    }
}
