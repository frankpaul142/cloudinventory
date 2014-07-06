<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//menu



Route::pattern('id', '[0-9]+');

//login / logout
    Route::get('login', 'LoginController@getIndex');
    Route::post('login', 'LoginController@postIndex');
    Route::get('logout', 'LoginController@getIndex');
//remind
    Route::get('recordar', 'RemindersController@getRemind');
    Route::post('recordar', 'RemindersController@postRemind');
    Route::get('recordar/form/{token}', 'RemindersController@getReset');
    Route::post('recordar/form', 'RemindersController@postReset');

    // Route::group(array('before' => 'auth|pageControl'), function(){
    Route::group(array('before' => ''), function(){
        //change password on first login
        Route::get('cambiarContrasena', 'LoginController@getChangePassword');
        Route::post('cambiarContrasena', 'LoginController@postChangePassword');
        
        //users
        Route::get('usuarios/{id?}', 'UserController@get');
        Route::post('usuarios', 'UserController@post');
        Route::post('usuarios/changeStatus', 'UserController@postChangeStatus');
        
        
        //suppliers
        Route::get('proveedores', 'SupplierController@getIndex');
        Route::get('proveedores/form/{id?}', 'SupplierController@getForm');
        Route::post('proveedores/form', 'SupplierController@postForm');
        Route::get('proveedores/eliminar/{id}', 'SupplierController@getDelete');
            
    });
    //root
    Route::get('/', function(){
        return View::make('hello');
    });

