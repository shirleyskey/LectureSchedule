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
    Route::post('/import-user', ['uses'=>'UserController@import','as'=>'user.import']);
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
    Route::get('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@create','as'=>'nckh.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@store','as'=>'nckh.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses' =>'NckhController@edit','as'=>'nckh.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses'=>'NckhController@update','as'=>'nckh.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-nckh'], 'uses'=>'NckhController@destroy','as'=>'nckh.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@exportExcel','as'=>'nckh.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@importExcel','as'=>'nckh.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@postImportExcel','as'=>'nckh.import-excel.post']);
});

//Công Tác Routes
Route::prefix('congtac')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-congtac'], 'uses'=>'CongtacController@index','as'=>'congtac.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-congtac'], 'uses'=>'CongtacController@read','as'=>'congtac.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongtacController@create','as'=>'congtac.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongtacController@store','as'=>'congtac.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-congtac'], 'uses' =>'CongtacController@edit','as'=>'congtac.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-congtac'], 'uses'=>'CongtacController@update','as'=>'congtac.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-congtac'], 'uses'=>'CongtacController@destroy','as'=>'congtac.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongtacController@exportExcel','as'=>'congtac.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongtacController@importExcel','as'=>'congtac.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongtacController@postImportExcel','as'=>'congtac.import-excel.post']);
});

//Chấm Bài Routes
Route::prefix('chambai')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-chambai'], 'uses'=>'ChamBaiController@index','as'=>'chambai.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-chambai'], 'uses'=>'ChamBaiController@read','as'=>'chambai.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@create','as'=>'chambai.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@store','as'=>'chambai.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-chambai'], 'uses' =>'ChamBaiController@edit','as'=>'chambai.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-chambai'], 'uses'=>'ChamBaiController@update','as'=>'chambai.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-chambai'], 'uses'=>'ChamBaiController@destroy','as'=>'chambai.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@exportExcel','as'=>'chambai.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@importExcel','as'=>'chambai.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@postImportExcel','as'=>'chambai.import-excel.post']);
});

//Đảng Routes
Route::prefix('dang')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-dang'], 'uses'=>'DangController@index','as'=>'dang.index']);
    Route::get('/add', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@create','as'=>'dang.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@store','as'=>'dang.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-dang'], 'uses' =>'DangController@edit','as'=>'dang.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-dang'], 'uses'=>'DangController@update','as'=>'dang.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-dang'], 'uses'=>'DangController@destroy','as'=>'dang.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@exportExcel','as'=>'dang.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@importExcel','as'=>'dang.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@postImportExcel','as'=>'dang.import-excel.post']);
});

//Dạy Giỏi Routes
Route::prefix('daygioi')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-daygioi'], 'uses'=>'DayGioiController@index','as'=>'daygioi.index']);
    Route::get('/add', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@create','as'=>'daygioi.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@store','as'=>'daygioi.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-daygioi'], 'uses' =>'DayGioiController@edit','as'=>'daygioi.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-daygioi'], 'uses'=>'DayGioiController@update','as'=>'daygioi.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-daygioi'], 'uses'=>'DayGioiController@destroy','as'=>'daygioi.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@exportExcel','as'=>'daygioi.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@importExcel','as'=>'daygioi.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@postImportExcel','as'=>'daygioi.import-excel.post']);
});

//Dạy Giỏi Routes
Route::prefix('xaydung')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-xaydung'], 'uses'=>'XayDungController@index','as'=>'xaydung.index']);
    Route::get('/add', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@create','as'=>'xaydung.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@store','as'=>'xaydung.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-xaydung'], 'uses' =>'XayDungController@edit','as'=>'xaydung.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-xaydung'], 'uses'=>'XayDungController@update','as'=>'xaydung.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-xaydung'], 'uses'=>'XayDungController@destroy','as'=>'xaydung.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@exportExcel','as'=>'xaydung.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@importExcel','as'=>'xaydung.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@postImportExcel','as'=>'xaydung.import-excel.post']);
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
    Route::post('/postThemNckh', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@postThemNckh','as'=>'postThemNckh']);
    Route::post('/postTimNckhTheoId', ['uses'=>'NckhController@postTimNckhTheoId','as'=>'postTimNckhTheoId']);
    Route::post('/postSuaNckh', ['middleware' => ['permission:update-nckh'], 'uses'=>'NckhController@postSuaNckh','as'=>'postSuaNckh']);
    Route::post('/postXoaNckh', ['middleware' => ['permission:delete-nckh'], 'uses'=>'NckhController@postXoaNckh','as'=>'postXoaNckh']);

    // Route::post('/postThemQuyetDinh', ['middleware' => ['permission:create-quyet-dinh'], 'uses'=>'QuyetDinhController@postThemQuyetDinh','as'=>'postThemQuyetDinh']);
    // Route::post('/postTimQuyetDinhTheoId', ['uses'=>'QuyetDinhController@postTimQuyetDinhTheoId','as'=>'postTimQuyetDinhTheoId']);
    // Route::post('/postSuaQuyetDinh', ['middleware' => ['permission:update-quyet-dinh'], 'uses'=>'QuyetDinhController@postSuaQuyetDinh','as'=>'postSuaQuyetDinh']);
    // Route::post('/postXoaQuyetDinh', ['middleware' => ['permission:delete-quyet-dinh'], 'uses'=>'QuyetDinhController@postXoaQuyetDinh','as'=>'postXoaQuyetDinh']);

});