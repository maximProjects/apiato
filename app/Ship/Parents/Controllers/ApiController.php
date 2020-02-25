<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\ApiController as AbstractApiController;
use Illuminate\Support\Facades\Config;

/**
 * Class ApiController.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class ApiController extends AbstractApiController
{
    public function callAction($method, $parameters)
    {
      $locale = Config::get('translatable.locale');

      if ($parameters) {
        $r = $parameters[0];

        $locale = $r->header('X-localization');
      }

      app()->setLocale($locale);

      return call_user_func_array([$this, $method], $parameters);
    }
}
