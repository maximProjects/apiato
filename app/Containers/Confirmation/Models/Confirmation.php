<?php

namespace App\Containers\Confirmation\Models;

use App\Containers\Media\Models\Media;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Confirmation extends Model
{
    protected $fillable = [
        "media_id"
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

  public function media()
  {
    return $this->belongsTo(Media::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'confirmations';
}
