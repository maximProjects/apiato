<?php

namespace App\Ship\Middlewares\Http;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Torzer\Awesome\Landlord\Facades\Landlord;

class CheckTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$next($request);
        //$uId = auth()->id();
        //
        //Landlord::addTenant('tenant_id', (int)$uId);

        return $next($request);
    }
}
