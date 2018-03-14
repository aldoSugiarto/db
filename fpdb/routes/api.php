<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//USER
Route::get('getu', 'userController@getUser');
Route::post('insertu', 'userController@insertUser');
Route::delete('deleteu', 'userController@deleteUser');
Route::put('updateu', 'userController@updateUser');

//ADMIN
Route::get('geta', 'adminController@getAdmin');
Route::post('inserta', 'adminController@insertAdmin');
Route::delete('deletea', 'adminController@deleteAdmin');
Route::put('updatea', 'adminController@updateAdmin');

//CATEGORY
Route::get('getc', 'categoryController@getCategory');
Route::post('insertc', 'categoryController@insertCategory');
Route::delete('deletec', 'categoryController@deleteCategory');
Route::put('updatec', 'categoryController@updateCategory');

//PRODUCT DETAIL
Route::get('getpd', 'productDetailController@getpd');
Route::post('insertpd', 'productDetailController@insertpd');
Route::delete('deletepd', 'productDetailController@deletepd');
Route::put('updatepd', 'productDetailController@updatepd');
