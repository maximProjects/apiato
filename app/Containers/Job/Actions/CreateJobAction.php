<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateJobAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $job = Apiato::call('Job@CreateJobTask', [$data]);

//        if($files)
//        {
//            Apiato::call('Job@UpdateJobAttachmentsTask', [$job->id, $files]);
//        }

        if(isset($data['comments']) && count($data['comments']) > 0)
        {
            Apiato::call('Job@UpdateJobCommentsTask', [$job->id, $data['comments']]);
        }

        return $job;
    }
}
