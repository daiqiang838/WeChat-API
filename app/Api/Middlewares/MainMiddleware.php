<?php
/**
 *  Create By Dingo
 */
namespace App\Api\Middlewares;

use Closure;

class MainMiddleware
{
    private static $request = null;

    public function handle($request, Closure $next){
        self::$request = $request;

        return $next($request);
    }
}

?>