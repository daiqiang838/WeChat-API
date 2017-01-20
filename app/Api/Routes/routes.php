<?php
/**
 *  总路由
 */

// Dingo API
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->any('/', function(){
        return 'This is WeChat API !';
    });

    //
    $api->group(['namespace' => 'App\Api\v1\Controllers', 'middleware' => 'main'], function($api){
        $api->group(['namespace' => 'User'], function($api){
            $api->get('user/login', 'UserController@userLogin');
        });
    });

});
