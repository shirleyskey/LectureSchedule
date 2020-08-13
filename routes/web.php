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

//Authentication routes...
Route::get('login', [
    'uses' => 'LoginController@getLogin',
    'as' => 'login'
]);

Route::post('login', [
    'uses' => 'LoginController@postLogin',
    'as' => 'login.post'
]);

Route::get('logout', 'LoginController@getLogout')->name('logout.get');

//Home Route...
Route::get('/', function(){
    return redirect()->route('dashboard');
});

//Dashboard Route
Route::get('dashboard', [
    'middleware' => ['permission:read-dashboard'],
    'uses'       => 'DashboardController@getDashboard',
    'as'         => 'dashboard'
])->middlware(['auth','only_active_user']);


