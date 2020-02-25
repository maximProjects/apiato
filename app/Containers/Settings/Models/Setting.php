<?php

namespace App\Containers\Settings\Models;

use App\Ship\Parents\Models\Model;

/**
 * Class Setting
 *
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Settings\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Settings\Models\Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Settings\Models\Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var  bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
