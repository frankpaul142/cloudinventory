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
    // Route::post('login', 'LoginController@postFacebook');
    Route::get('logout', 'LoginController@getIndex');
//remind
    Route::get('recordar', 'RemindersController@getRemind');
    Route::post('recordar', 'RemindersController@postRemind');
    Route::get('recordar/form/{token}', 'RemindersController@getReset');
    Route::post('recordar/form', 'RemindersController@postReset');

    Route::group(array('before' => 'auth|pageControl'), function(){
        //home
        Route::get('inicio', function(){
            return View::make('home');
        });

        //change password on first login
        Route::get('cambiarContrasena', 'LoginController@getChangePassword');
        Route::post('cambiarContrasena', 'LoginController@postChangePassword');
        
        //users
        Route::get('usuarios/{id?}', 'UserController@get');
        Route::post('usuarios', 'UserController@post');
        
        //products
        Route::get('productos/{id?}', 'ProductController@get');
        Route::post('productos', 'ProductController@post');
        Route::post('productos/cargarProductosProveedor', 'ProductController@postLoadSupplierProducts');
        Route::post('productos/stock', 'ProductController@postStock');

        //suppliers
        Route::get('distribuidores/{id?}', 'SupplierController@get');
        Route::post('distribuidores', 'SupplierController@post');
        Route::post('distribuidoresProductos', 'SupplierController@postProductos');

        //orders
        Route::get('pedidos/{id?}', 'SupplierOrderController@get');
        Route::post('pedidos', 'SupplierOrderController@post');

        //adjustments
        Route::get('ajustes/{id?}', 'AdjustmentController@get');
        Route::post('ajustes', 'AdjustmentController@post');
        
        //alerts
        Route::get('alertas/{id?}', 'AlertController@get');
        Route::post('alertas', 'AlertController@post');

    });

    //root
    Route::get('/', function(){
        return Redirect::to('inicio');
        // $FacebookRedirectLoginHelper = Facebook::connect();
        // echo $loginUrl = $FacebookRedirectLoginHelper->getLoginUrl(array('email','friends_likes'));
    });

    Route::get('test', function(){
        // Globals::triggerAlerts(1, array('productId'=>3));
    });

