<?php

namespace App\Ship\Parents\Requests;

use Apiato\Core\Abstracts\Requests\Request as AbstractRequest;
use App\Containers\User\Models\User;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\Auth;
/**
 * Class Request
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
abstract class Request extends AbstractRequest
{

    /**
     * If no custom Transporter is set on the child this will be default.
     *
     * @var string
     */
    protected $transporter = DataTransporter::class;


    public function hasAccess(User $user = null)
    {
        $user = Auth::user();
        if($user) {
            $premissonErrors = $user->checkPermission($this->access);
        }
        if(isset($premissonErrors)) {
            if (count($premissonErrors)) {
                //dump($premissonErrors);return response('Hello World', 401);
                return false;
            }
        }
       return parent::hasAccess();

    }
}
