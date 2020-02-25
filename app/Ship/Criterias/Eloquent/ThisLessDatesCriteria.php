<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

/**
 * Class ThisBetweenDatesCriteria
 * 
 * @author Fabian Widmann <fabian.widmann@gmail.com>
 *
 * Retrieves all entities whose date $field's value is between $start and $end.
 */
class ThisLessDatesCriteria extends Criteria
{

    /**
     * @var Carbon
     */
    private $date;


    /**
     * @var string
     */
    private $field;


    public function __construct($field, Carbon $date)
    {
        $this->date = $date;
        $this->field = $field;
    }

    /**
     * Applies the criteria
     * 
     * @param Builder $model
     * @param         $repository
     * 
     * @return        mixed
     */
    public function apply($model, $repository)
    {
        return $model->where($this->field, '<=', $this->date->toDateString());
    }
}
