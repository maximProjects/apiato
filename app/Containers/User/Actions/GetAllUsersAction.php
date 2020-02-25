<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;

/**
 * Class GetAllUsersAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetAllUsersAction extends Action
{

    /**
     * @return mixed
     */
    public function run(DataTransporter $data)
    {

        $params = $data->sanitizeInput([
            "orderBy",
            "sortedBy",
            "limit",
            "page",
            "role_id"
        ]);

        return Apiato::call('User@GetAllUsersTask',
            [$params],
            [
                'addRequestCriteria',
                'ordered',
            ]
        );
    }
}
