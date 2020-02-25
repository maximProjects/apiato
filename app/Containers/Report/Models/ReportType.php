<?php

namespace App\Containers\Report\Models;

use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;

class ReportType extends Model
{

    use Translatable;

    public $translatedAttributes = [
        'name'
    ];

    protected $fillable = [
        'name',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getForeignKey()
    {
        return 'report_type_id';
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'report_types';
    protected $table = 'report_types';
}
