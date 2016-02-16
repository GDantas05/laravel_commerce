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

Route::group(['prefix' => 'admin'], function() {
   Route::get('products', ['as'=>'produtos', 'AdminProductsController@index']); 
   Route::get('categories',['as'=>'categorias', 'AdminCategoriesController@index']);
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
