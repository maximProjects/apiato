<?php

namespace App\Containers\Report\Data\Repositories;

use App\Containers\Report\Models\ReportType;
use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReportRepository
 */
class ReportRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];


    public function type() {
        return $this->belongsTo(ReportType::class);
    }
}
