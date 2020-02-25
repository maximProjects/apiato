<?php

namespace App\Containers\Wepay\Models;

use App\Containers\Payment\Models\AbstractPaymentAccount;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WepayAccount
 *
 * @author Rockers Technologies <jaimin.rockersinfo@gmail.com>
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $type
 * @property string|null $imageUrl
 * @property string|null $gaqDomains
 * @property string|null $mcc
 * @property string|null $country
 * @property string|null $currencies
 * @property string|null $userId
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Containers\Payment\Models\PaymentAccount $paymentAccount
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Wepay\Models\WepayAccount onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereCurrencies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereGaqDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereMcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Wepay\Models\WepayAccount whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Wepay\Models\WepayAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Wepay\Models\WepayAccount withoutTrashed()
 * @mixin \Eloquent
 */
class WepayAccount extends AbstractPaymentAccount
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'type',
        'imageUrl',
        'gaqDomains',
        'mcc',
        'country',
        'currencies',
        'userId',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * @return string
     */
    public function getPaymentGatewayReadableName()
    {
        return 'Wepay';
    }

    /**
     * @return string
     */
    public function getPaymentGatewaySlug()
    {
        return 'wepay';
    }
}
