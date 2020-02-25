<?php

namespace App\Ship\Middlewares\Http;

use App\Containers\Authentication\Exceptions\AuthenticationException;
use Exception;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Containers\Authorization\Models\Role;

/**
 * Class Authenticate
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Authenticate extends LaravelAuthenticate
{

    public function authenticate($request, array $guards)
    {
        try {

   //       $auth = parent::authenticate($request, $guards);
//            $request;
//            die;
//            dump(\Auth::user()->subscriptions()->get());
//            dump(Route::getCurrentRoute()->getActionName());
    //        $u = Auth::user();
//            $subscr = $u->subscriptions()->first();
//            $plan = $subscr->activeSubscription();
//            die($plan);
      //      dump($request);


// get requested action
         //   $actionName = class_basename($request->route()->getActionname());

//            dump($request->route()->getActionname());
            parent::authenticate($request, $guards);
        }
        catch (Exception $exception) {
            throw new AuthenticationException();
        }
    }
}
