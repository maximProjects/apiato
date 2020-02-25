<?php

namespace App\Containers\Stripe\Models;

use App\Containers\Payment\Models\AbstractPaymentAccount;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StripeAccount.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 * @property int $id
 * @property string $customer_id
 * @property string|null $card_id
 * @property string|null $card_funding
 * @property string|null $card_last_digits
 * @property string|null $card_fingerprint
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Containers\Payment\Models\PaymentAccount $paymentAccount
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Stripe\Models\StripeAccount onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCardFingerprint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCardFunding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCardLastDigits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Stripe\Models\StripeAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Stripe\Models\StripeAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Containers\Stripe\Models\StripeAccount withoutTrashed()
 * @mixin \Eloquent
 */
class StripeAccount extends AbstractPaymentAccount
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'card_id',
        'card_funding',
        'card_last_digits',
        'card_fingerprint',
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
     * @return string
     */
    public function getPaymentGatewayReadableName()
    {
        return 'Stripe';
    }

    /**
     * @return string
     */
    public function getPaymentGatewaySlug()
    {
        return 'stripe';
    }
}
