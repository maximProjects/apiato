<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetJobCommentsAction extends Action
{
    public function run(Request $request)
    {
        $comments = Apiato::call('Job@GetJobCommentsTask', [$request->id]);

        return $comments;
    }
}
