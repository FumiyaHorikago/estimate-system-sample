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

Route::group(['middleware'=>'auth','prefix' => 'management', 'as' => 'manage.'],function(){
    Route::get('/','ManageController@showManage')->name('home');
    Route::get('/sort','ManageController@showSort')->name('sort');
    Route::get('/parent','ManageController@showParent')->name('parent');
    Route::get('/config','ManageController@showConfig')->name('config');
    Route::get('/contact','ManageController@showContact')->name('contact');
    Route::get('/contact/{id}','ManageController@showContactDetails')->name('contact.details');

    Route::post('/child/store','ChildrenController@store')->name('child.store');
    Route::post('/child/update','ChildrenController@update')->name('child.update');
    Route::get('/child/destroy/{id}','ChildrenController@destroy')->name('child.destroy');
    Route::post('/child/order','ChildrenController@order')->name('child.order');
    Route::post('/getchildren/{id}','ChildrenController@getChildren');

    Route::post('/parent/update','ParentsController@update')->name('parent.update');

    Route::post('/money/update','ManageController@moneyUpdate')->name('money.update');
});

Route::post('/management/getchild/{id}','ChildrenController@getChild');
Route::post('/child/choice','ChildrenController@choiceChildren');

Route::post('/contact','MasterController@getEstimateData')->name('send.estimate');
Route::get('/contact','MasterController@showContact');
Route::post('/contact/confirm','MasterController@sendContactData')->name('contact.check');
Route::get('/contact/confirm','MasterController@showConfirm');
Route::post('/contact/complete','MasterController@storeContactData')->name('contact.store');
Route::get('/contact/complete','MasterController@showComplete')->name('contact.complete');