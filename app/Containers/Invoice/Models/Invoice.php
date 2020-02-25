<?php

namespace App\Containers\Invoice\Models;

use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Invoice extends Model
{
    protected $fillable = [
        'project_id',
        'project_group_id',
        'user_id',
        'invoice_date',
        'total',
        'number',
        'payment_date',
        'invoice_type',
        'comment',
        'is_paid',
        'media'
    ];

    protected $appends = [
        'total_with_vat'
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

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function getTotalWithVatAttribute() {
        return $this->total + $this->total*0.21;
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'invoices';
}
