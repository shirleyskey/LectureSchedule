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

Route::get('dashboard/read', [
    'middleware' => ['permission:read-dashboard'],
    'uses'       => 'DashboardController@readDashboard',
    'as'         => 'dashboard.read'
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

Route::prefix('lichgiang')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/phancong', ['uses'=>'LichGiangController@phancong','as'=>'lichgiang.phancong']);
    Route::get('/lichgiangtuan', ['uses'=>'LichGiangController@index','as'=>'lichgiang.lichgiangtuan']);
    Route::post('/lichgiangtuan/create', ['uses'=>'LichGiangController@store','as'=>'lichgiang.lichgiangtuan.create']);
    Route::post('/lichgiangtuan/update', ['uses'=>'LichGiangController@update','as'=>'lichgiang.lichgiangtuan.update']);
    Route::post('/lichgiangtuan/delete', ['uses'=>'LichGiangController@destroy','as'=>'lichgiang.lichgiangtuan.delete']);
});

// NCKH Routes...
Route::prefix('nckh')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-nckh'], 'uses'=>'NckhController@index','as'=>'nckh.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-nckh'], 'uses'=>'NckhController@read','as'=>'nckh.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@create','as'=>'nckh.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@store','as'=>'nckh.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses' =>'NckhController@edit','as'=>'nckh.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses'=>'NckhController@update','as'=>'nckh.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-nckh'], 'uses'=>'NckhController@destroy','as'=>'nckh.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@exportExcel','as'=>'nckh.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@importExcel','as'=>'nckh.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@postImportExcel','as'=>'nckh.import-excel.post']);
});


// Nhân Sự Routes...
Route::prefix('congtac')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-congtac'], 'uses'=>'CongTacController@index','as'=>'congtac.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-congtac'], 'uses'=>'CongTacController@read','as'=>'congtac.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@create','as'=>'congtac.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@store','as'=>'congtac.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-congtac'], 'uses' =>'CongTacController@edit','as'=>'congtac.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-congtac'], 'uses'=>'CongTacController@update','as'=>'congtac.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-congtac'], 'uses'=>'CongTacController@destroy','as'=>'congtac.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@exportExcel','as'=>'congtac.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@importExcel','as'=>'congtac.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@postImportExcel','as'=>'congtac.import-excel.post']);
});

// Ajax Routes...
Route::prefix('ajax')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::post('/dsGiangVien', ['uses'=>'CongTacController@dsGiangVien','as'=>'dsGiangVien']);
    // Route::post('/postThemHopDong', ['middleware' => ['permission:create-hop-dong'], 'uses'=>'HopDongController@postThemHopDong','as'=>'postThemHopDong']);
    // Route::post('/postTimHopDongTheoId', ['uses'=>'HopDongController@postTimHopDongTheoId','as'=>'postTimHopDongTheoId']);
    // Route::post('/postSuaHopDong', ['middleware' => ['permission:update-hop-dong'], 'uses'=>'HopDongController@postSuaHopDong','as'=>'postSuaHopDong']);
    // Route::post('/postXoaHopDong', ['middleware' => ['permission:delete-hop-dong'], 'uses'=>'HopDongController@postXoaHopDong','as'=>'postXoaHopDong']);

    // Route::post('/postThemQuyetDinh', ['middleware' => ['permission:create-quyet-dinh'], 'uses'=>'QuyetDinhController@postThemQuyetDinh','as'=>'postThemQuyetDinh']);
    // Route::post('/postTimQuyetDinhTheoId', ['uses'=>'QuyetDinhController@postTimQuyetDinhTheoId','as'=>'postTimQuyetDinhTheoId']);
    // Route::post('/postSuaQuyetDinh', ['middleware' => ['permission:update-quyet-dinh'], 'uses'=>'QuyetDinhController@postSuaQuyetDinh','as'=>'postSuaQuyetDinh']);
    // Route::post('/postXoaQuyetDinh', ['middleware' => ['permission:delete-quyet-dinh'], 'uses'=>'QuyetDinhController@postXoaQuyetDinh','as'=>'postXoaQuyetDinh']);

});