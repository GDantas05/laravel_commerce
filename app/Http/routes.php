<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::pattern('id', '[0-9]+'); //CRIA UMA EXPRESSÃO REGULAR, QUALQUER PARÂMETRO COM O NOME ID DEVE SER NUMÉRICO COM PELO MENOS UM DÍGITO

/*Route::get('user/{id?}', function($id = 123){
   if ($id)
    return "Olá $id";
    
   return "Não possui id";        
});*/

Route::group(['middleware' => 'web'], function () {
   Route::get('/', 'StoreController@index');
   Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
   Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']); 
   Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
   Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']); 
   Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']); 
   Route::get('teste/login', ['as' => 'teste.login', 'uses' => 'TesteController@getLogin']);
   Route::get('teste/logout', ['as' => 'teste.logout', 'uses' => 'TesteController@getLogout']);
});

Route::group(['middleware' => ['web', 'auth']], function (){
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::get('test', 'CheckoutController@test');

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'where' => ['id' => '[0-9]+']], function() {
    
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', ['as' => 'products', 'uses' => 'ProductsController@index']); 
        Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);     
        
            Route::group(['prefix' => 'images'], function(){
                Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);    
                Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);    
                Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']); 
                Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']); 
            });
    });
    
   Route::group(['prefix' => 'categories'], function(){
        Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);  
        
   });
});

Route::group(['middleware' => 'web'], function(){
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);
});

Route::get('evento', function() {
   //\Illuminate\Support\Facades\Event::fire(new \CodeCommerce\Events\CheckoutEvent()); 
   event(new \CodeCommerce\Events\CheckoutEvent()); 
});

//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web']], function () {
    //
});*/
