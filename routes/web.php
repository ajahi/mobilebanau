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
use Illuminate\Support\Facades\Auth;



Auth::routes();


Route::get('/','OrderController@create');
Route::post('/order','OrderController@store');
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/orderindex','OrderController@index');
    
    Route::get('/order/{id}',"OrderController@show");
    Route::post('orderupdate/{id}','OrderController@updateorder');
    Route::get('/ordercancel/{id}',"OrderController@cancelorder");
    Route::get('/ccupdate','OrderController@AssignRider');

    Route::get('/rider','RiderController@index');
    Route::get('pick/{id}','OrderController@pickorder');

    Route::get('mechanic','MechanicController@index');
    Route::get('/mechanic/{id}','MechanicController@updatestatus');
    
});
