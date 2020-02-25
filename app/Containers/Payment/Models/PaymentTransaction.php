<?php

namespace App\Containers\Payment\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentTransaction
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 * @property int $id
 * @property int $user_id
 * @property string $gateway
 * @property string $transaction_id
 * @property string $status
 * @property bool $is_successful
 * @property string $amount
 * @property string|null $currency
 * @property array $data
 * @property array $custom
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentTransaction onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereCustom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereIsSuccessful($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Payment\Models\PaymentTransaction whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Payment\Models\PaymentTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class PaymentTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',

        'gateway',
        'transaction_id',
        'status',
        'is_successful',

        'amount',
        'currency',

        'data',
        'custom',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'is_successful' => 'boolean',
        'data' => 'array',
        'custom' => 'array',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'paymenttransactions';
}
