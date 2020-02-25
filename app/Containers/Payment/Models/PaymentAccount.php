<?php

namespace App\Containers\Payment\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentAccount
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 * @property int $id
 * @property string|null $name
 * @property string $accountable_type
 * @property int $accountable_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $accountable
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentAccount onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereAccountableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereAccountableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentAccount withoutTrashed()
 * @mixin \Eloquent
 */
class PaymentAccount extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'accountable_id',
        'accountable_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];


    /**
     * @return  \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function accountable()
    {
        return $this->morphTo();
    }
}
