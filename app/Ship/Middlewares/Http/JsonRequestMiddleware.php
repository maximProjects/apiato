<?php

namespace App\Ship\Middlewares\Http;

use Closure;


class JsonRequestMiddleware
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
        if(in_array($request->method(), ['POST', 'PUT', 'PATCH'])
            && !$request->isJson()
            && $request->get('data'))
        {
            $data = json_decode($request->get('data'), true);
            $all = $request->all();
            unset($all['data']);

            if(!is_array($data))
                $data = [$data];

            $all = array_merge($all, $data);
            $request->request->replace($all);

        }
        return $next($request);
    }
}
