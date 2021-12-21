<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MasterController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>'auth','prefix' => 'manage', 'as' => 'manage.'],function(){
    Route::get('/','MasterController@showManage')->name('home');

    Route::post('/child/store','ChildrenController@store')->name('child.store');
    Route::post('/child/update','ChildrenController@update')->name('child.update');
    Route::get('/child/destroy/{id}','ChildrenController@destroy')->name('child.destroy');
    Route::post('/child/order','ChildrenController@order')->name('child.order');
    Route::post('/getchild/{id}','ChildrenController@getChild');
    Route::post('/getchildren/{id}','ChildrenController@getChildren');
});