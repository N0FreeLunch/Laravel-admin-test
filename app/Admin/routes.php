<?php

use Illuminate\Routing\Router;

// use \App\Admin\Controllers\UserController;
// use \App\Admin\Controllers\MovieController;

Admin::routes();

// Route::group([
//     'prefix'        => config('admin.route.prefix'),
//     'namespace'     => config('admin.route.namespace'),
//     'middleware'    => config('admin.route.middleware'),
//     'as'            => config('admin.route.prefix') . '.',
// ], function (Router $router) {
//
//     $router->get('/', 'HomeController@index')->name('home');
//    $router->resource('demo/users', UserController::class);
//
// });

Route::prefix(config('admin.route.prefix'))
      ->middleware(config('admin.route.middleware'))
      ->namespace(config('admin.route.namespace'))
      ->name(config('admin.route.prefix') . '.')
      ->group(function () {
        Route::get('user/profile', function () {
            // Uses first & second middleware...
        });

        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('demo/users', UserController::class);
        Route::resource('demo/movies', MovieController::class);
      });
