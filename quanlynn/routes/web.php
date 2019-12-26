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

Route::get('/', 'HomePageController@index');

Route::group(['prefix'=>'admin','middleware'=>['auth','adminlogin']],function(){

	Route::get('index','UserController@index')->name('index');	
	Route::resource('account','UserController');
	Route::resource('/ctphong','ChitietphongController');
	
	Route::resource('/diadiem','DiaDiemController');
	Route::get('timkiem_dd','DiaDiemController@get_diadiem')->name("get_diadiem");
	Route::resource('/nhanghi','NhaNghiController');
	Route::resource('/phong','PhongController');
	Route::resource('/tiennghi','TienNghiController');
	Route::resource('/user','UserController');
	Route::resource('/datphong','DatPhongController');
});

	Route::group(['prefix'=>'chu','middleware'=>['auth']],function(){
 	Route::resource('/nhanghi','NhaNghiController');

 });

    Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
 	Route::get('/homepage', 'HomePageController@index')->name('home');
	
});	
    Route::get('ctphong/{id}','ChitietphongController@getChitiet');
    Route::post('store','ChitietphongController@store')->name('storect');
    Route::post('ctphong/ctdatphong','ChiTietPhongController@showChitiet')->name('ctphong.showChitiet');
 	Route::get('/homepage', 'HomePageController@index')->name('home');
Auth::routes();