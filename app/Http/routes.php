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
Route::pattern('id', '[0-9]+'); //CRIA UMA EXPRESSÃO REGULAR, QUALQUER PARÂMETRO COM O NOME ID DEVE SER NUMÉRICO COM PELO MENOS UM DÍGITO

Route::get('user/{id?}', function($id = 123){
   if ($id)
    return "Olá $id";
    
   return "Não possui id";        
});
//Route::group(['middleware' => 'web'], function () { Route::get('/my-form', 'MyController @xxxx '); });
Route::group(['prefix' => 'admin', 'middleware' => 'web', 'where' => ['id' => '[0-9]+']], function() {
    
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

Route::get('category/{category}', function (CodeCommerce\Category $category) {
   return $category->name; 
});

Route::get('/', function () {
    return view('welcome');
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

Route::group(['middleware' => ['web']], function () {
    //
});
