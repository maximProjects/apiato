<?php

namespace App\Containers\Subscription\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SubscriptionRepository
 */
class SubscriptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
