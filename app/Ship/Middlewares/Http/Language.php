<?php

namespace App\Ship\Middlewares\Http;

use Closure;
use Torzer\Awesome\Landlord\Facades\Landlord;
use Illuminate\Support\Facades\Config;

class Language
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

        // read the language from the request header
        $locale = $request->header('X-localization');

        // if the header is missed
        if(!$locale){
            // take the default local language
            $locale = Config::get('translatable.locale');
        }


        // check the languages defined is supported
        if (array_search($locale, Config::get('translatable.locales')) === false) {
            // respond with error
            return abort(403, 'Language not supported.');
        }

        // set the local language
        app()->setLocale($locale);

        // get the response after the request is done
        $response = $next($request);

        // set Content Languages header in the response
        $response->headers->set('Content-Language', $locale);

        // return the response
        return $response;
    }
}
