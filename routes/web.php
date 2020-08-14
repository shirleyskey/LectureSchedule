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
use Illuminate\Support\Facades\Input;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

// Elkfinder...
Route::get('glide/{path}', function($path){
    $server = ServerFactory::create([
        'source' => app('filesystem')->disk('public')->getDriver(),
        'cache' => storage_path('glide'),
        'response' => new LaravelResponseFactory(app('request'))
    ]);
    $response = $server->getImageResponse($path, Input::query());
    $response->send();
})->where('path', '.+');
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
])->middleware(['auth','only_active_user']);

// User Routes...
Route::prefix('users')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-users'], 'uses'=>'UserController@index','as'=>'user.index']);
    Route::get('/add', ['middleware' => ['permission:create-users'], 'uses'=>'UserController@create','as'=>'user.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-users'], 'uses'=>'UserController@store','as'=>'user.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-users'], 'uses' =>'UserController@edit','as'=>'user.edit.get']);
    Route::post('/edit', ['middleware' => ['permission:update-users'], 'uses'=>'UserController@update','as'=>'user.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-users'], 'uses'=>'UserController@destroy','as'=>'user.delete.get']);
    Route::get('/export-user', ['uses'=>'UserController@export','as'=>'user.export']);
    Route::get('/import-user', ['uses'=>'UserController@getImport','as'=>'user.import.get']);
});

// File Manager
Route::prefix('file-manager')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:update-file-manager'], 'uses'=>'FileManagerController@index','as'=>'file-manager.index']);
});

// Nhân Sự Routes...
Route::prefix('giangvien')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-giangvien'], 'uses'=>'GiangVienController@index','as'=>'giangvien.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-giangvien'], 'uses'=>'GiangVienController@read','as'=>'giangvien.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@create','as'=>'giangvien.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@store','as'=>'giangvien.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-giangvien'], 'uses' =>'GiangVienController@edit','as'=>'giangvien.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-giangvien'], 'uses'=>'GiangVienController@update','as'=>'giangvien.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-giangvien'], 'uses'=>'GiangVienController@destroy','as'=>'giangvien.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@exportExcel','as'=>'giangvien.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@importExcel','as'=>'giangvien.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@postImportExcel','as'=>'giangvien.import-excel.post']);
});