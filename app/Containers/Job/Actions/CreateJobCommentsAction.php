<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateJobCommentsAction extends Action
{
    public function run(array $data)
    {
        $comments = Apiato::call('Job@UpdateJobCommentsTask', [$data['id'], [$data]]);

        return $comments;
    }
}
