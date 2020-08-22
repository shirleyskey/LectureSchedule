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

// Giảng Viên Routes...
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

// Lớp Routes...
Route::prefix('lop')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-lop'], 'uses'=>'LopController@index','as'=>'lop.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-lop'], 'uses'=>'LopController@read','as'=>'lop.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-lop'], 'uses'=>'LopController@create','as'=>'lop.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-lop'], 'uses'=>'LopController@store','as'=>'lop.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-lop'], 'uses' =>'LopController@edit','as'=>'lop.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-lop'], 'uses'=>'LopController@update','as'=>'lop.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-lop'], 'uses'=>'LopController@destroy','as'=>'lop.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-lop'], 'uses'=>'LopController@exportExcel','as'=>'lop.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-lop'], 'uses'=>'LopController@importExcel','as'=>'lop.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-lop'], 'uses'=>'LopController@postImportExcel','as'=>'lop.import-excel.post']);
});

// Học Phần Routes...
Route::prefix('hocphan')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-hocphan'], 'uses'=>'HocPhanController@index','as'=>'hocphan.index']);
    Route::get('/read/{id}', ['middleware' => ['permission:read-hocphan'], 'uses'=>'HocPhanController@read','as'=>'hocphan.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@create','as'=>'hocphan.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@store','as'=>'hocphan.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-hocphan'], 'uses' =>'HocPhanController@edit','as'=>'hocphan.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-hocphan'], 'uses'=>'HocPhanController@update','as'=>'hocphan.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'HocPhanController@destroy','as'=>'hocphan.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@exportExcel','as'=>'hocphan.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@importExcel','as'=>'hocphan.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@postImportExcel','as'=>'hocphan.import-excel.post']);
});

// Học Phần Routes...
Route::prefix('bai')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/read/{id}', ['middleware' => ['permission:read-bai'], 'uses'=>'BaiController@read','as'=>'bai.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@create','as'=>'bai.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@store','as'=>'bai.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-bai'], 'uses' =>'BaiController@edit','as'=>'bai.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-bai'], 'uses'=>'BaiController@update','as'=>'bai.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-bai'], 'uses'=>'BaiController@destroy','as'=>'bai.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@exportExcel','as'=>'bai.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@importExcel','as'=>'bai.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@postImportExcel','as'=>'bai.import-excel.post']);
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

//Xây Dựng Routes
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

//Dot Xuat Routes
Route::prefix('dotxuat')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-dotxuat'], 'uses'=>'DotXuatController@index','as'=>'dotxuat.index']);
    Route::get('/add', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@create','as'=>'dotxuat.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@store','as'=>'dotxuat.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-dotxuat'], 'uses' =>'DotXuatController@edit','as'=>'dotxuat.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-dotxuat'], 'uses'=>'DotXuatController@update','as'=>'dotxuat.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-dotxuat'], 'uses'=>'DotXuatController@destroy','as'=>'dotxuat.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@exportExcel','as'=>'dotxuat.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@importExcel','as'=>'dotxuat.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@postImportExcel','as'=>'dotxuat.import-excel.post']);
});

//Sang Kien Routes
Route::prefix('sangkien')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-sangkien'], 'uses'=>'SangKienController@index','as'=>'sangkien.index']);
    Route::get('/add', ['middleware' => ['permission:create-sangkien'], 'uses'=>'SangKienController@create','as'=>'sangkien.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-sangkien'], 'uses'=>'SangKienController@store','as'=>'sangkien.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-sangkien'], 'uses' =>'SangKienController@edit','as'=>'sangkien.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-sangkien'], 'uses'=>'SangKienController@update','as'=>'sangkien.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-sangkien'], 'uses'=>'SangKienController@destroy','as'=>'sangkien.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-sangkien'], 'uses'=>'SangKienController@exportExcel','as'=>'sangkien.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-sangkien'], 'uses'=>'SangKienController@importExcel','as'=>'sangkien.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-sangkien'], 'uses'=>'SangKienController@postImportExcel','as'=>'sangkien.import-excel.post']);
});

//Học Tập Routes
Route::prefix('hoctap')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-hoctap'], 'uses'=>'HocTapController@index','as'=>'hoctap.index']);
    Route::get('/add', ['middleware' => ['permission:create-hoctap'], 'uses'=>'HocTapController@create','as'=>'hoctap.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-hoctap'], 'uses'=>'HocTapController@store','as'=>'hoctap.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-hoctap'], 'uses' =>'HocTapController@edit','as'=>'hoctap.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-hoctap'], 'uses'=>'HocTapController@update','as'=>'hoctap.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-hoctap'], 'uses'=>'HocTapController@destroy','as'=>'hoctap.delete.get']);
    Route::get('/export-excel', ['middleware' => ['permission:create-hoctap'], 'uses'=>'HocTapController@exportExcel','as'=>'hoctap.export-excel.get']);
    Route::get('/import-excel', ['middleware' => ['permission:create-hoctap'], 'uses'=>'HocTapController@importExcel','as'=>'hoctap.import-excel.get']);
    Route::post('/import-excel', ['middleware' => ['permission:create-hoctap'], 'uses'=>'HocTapController@postImportExcel','as'=>'hoctap.import-excel.post']);
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

    Route::post('/postThemCongTac', ['middleware' => ['permission:create-congtac'], 'uses'=>'CongTacController@postThemCongTac','as'=>'postThemCongTac']);
    Route::post('/postTimCongTacTheoId', ['uses'=>'CongTacController@postTimCongTacTheoId','as'=>'postTimCongTacTheoId']);
    Route::post('/postSuaCongTac', ['middleware' => ['permission:update-congtac'], 'uses'=>'CongTacController@postSuaCongTac','as'=>'postSuaCongTac']);
    Route::post('/postXoaCongTac', ['middleware' => ['permission:delete-congtac'], 'uses'=>'CongTacController@postXoaCongTac','as'=>'postXoaCongTac']);

    Route::post('/postThemChamBai', ['middleware' => ['permission:create-chambai'], 'uses'=>'ChamBaiController@postThemChamBai','as'=>'postThemChamBai']);
    Route::post('/postTimChamBaiTheoId', ['uses'=>'ChamBaiController@postTimChamBaiTheoId','as'=>'postTimChamBaiTheoId']);
    Route::post('/postSuaChamBai', ['middleware' => ['permission:update-chambai'], 'uses'=>'ChamBaiController@postSuaChamBai','as'=>'postSuaChamBai']);
    Route::post('/postXoaChamBai', ['middleware' => ['permission:delete-chambai'], 'uses'=>'ChambaiController@postXoaChamBai','as'=>'postXoaChamBai']);

    Route::post('/postThemDang', ['middleware' => ['permission:create-dang'], 'uses'=>'DangController@postThemDang','as'=>'postThemDang']);
    Route::post('/postTimDangTheoId', ['uses'=>'DangController@postTimDangTheoId','as'=>'postTimDangTheoId']);
    Route::post('/postSuaDang', ['middleware' => ['permission:update-dang'], 'uses'=>'DangController@postSuaDang','as'=>'postSuaDang']);
    Route::post('/postXoaDang', ['middleware' => ['permission:delete-dang'], 'uses'=>'DangController@postXoaDang','as'=>'postXoaDang']);

    Route::post('/postThemDayGioi', ['middleware' => ['permission:create-daygioi'], 'uses'=>'DayGioiController@postThemDayGioi','as'=>'postThemDayGioi']);
    Route::post('/postTimDayGioiTheoId', ['uses'=>'DayGioiController@postTimDayGioiTheoId','as'=>'postTimDayGioiTheoId']);
    Route::post('/postSuaDayGioi', ['middleware' => ['permission:update-daygioi'], 'uses'=>'DayGioiController@postSuaDayGioi','as'=>'postSuaDayGioi']);
    Route::post('/postXoaDayGioi', ['middleware' => ['permission:delete-daygioi'], 'uses'=>'DayGioiController@postXoaDayGioi','as'=>'postXoaDayGioi']);

    Route::post('/postThemXayDung', ['middleware' => ['permission:create-xaydung'], 'uses'=>'XayDungController@postThemXayDung','as'=>'postThemXayDung']);
    Route::post('/postTimXayDungTheoId', ['uses'=>'XayDungController@postTimXayDungTheoId','as'=>'postTimXayDungTheoId']);
    Route::post('/postSuaXayDung', ['middleware' => ['permission:update-xaydung'], 'uses'=>'XayDungController@postSuaXayDung','as'=>'postSuaXayDung']);
    Route::post('/postXoaXayDung', ['middleware' => ['permission:delete-xaydung'], 'uses'=>'XayDungController@postXoaXayDung','as'=>'postXoaXayDung']);

    Route::post('/postThemDotXuat', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'DotXuatController@postThemDotXuat','as'=>'postThemDotXuat']);
    Route::post('/postTimDotXuatTheoId', ['uses'=>'DotXuatController@postTimDotXuatTheoId','as'=>'postTimDotXuatTheoId']);
    Route::post('/postSuaDotXuat', ['middleware' => ['permission:update-xaydung'], 'uses'=>'DotXuatController@postSuaDotXuat','as'=>'postSuaDotXuat']);
    Route::post('/postXoaDotXuat', ['middleware' => ['permission:delete-xaydung'], 'uses'=>'DotXuatController@postXoaDotXuat','as'=>'postXoaDotXuat']);

    Route::post('/postThemSangKien', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'SangKienController@postThemSangKien','as'=>'postThemSangKien']);
    Route::post('/postTimSangKienTheoId', ['uses'=>'SangKienController@postTimSangKienTheoId','as'=>'postTimSangKienTheoId']);
    Route::post('/postSuaSangKien', ['middleware' => ['permission:update-xaydung'], 'uses'=>'SangKienController@postSuaSangKien','as'=>'postSuaSangKien']);
    Route::post('/postXoaSangKien', ['middleware' => ['permission:delete-xaydung'], 'uses'=>'SangKienController@postXoaSangKien','as'=>'postXoaSangKien']);

    Route::post('/postThemHocTap', ['middleware' => ['permission:create-dotxuat'], 'uses'=>'HocTapController@postThemHocTap','as'=>'postThemHocTap']);
    Route::post('/postTimHocTapTheoId', ['uses'=>'HocTapController@postTimHocTapTheoId','as'=>'postTimHocTapTheoId']);
    Route::post('/postSuaHocTap', ['middleware' => ['permission:update-xaydung'], 'uses'=>'HocTapController@postSuaHocTap','as'=>'postSuaHocTap']);
    Route::post('/postXoaHocTap', ['middleware' => ['permission:delete-xaydung'], 'uses'=>'HocTapController@postXoaHocTap','as'=>'postXoaHocTap']);

    Route::post('/postThemBai', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@postThemBai','as'=>'postThemBai']);
    Route::post('/postTimBaiTheoId', ['uses'=>'BaiController@postTimBaiTheoId','as'=>'postTimBaiTheoId']);
    Route::post('/postSuaBai', ['middleware' => ['permission:update-bai'], 'uses'=>'BaiController@postSuaBai','as'=>'postSuaBai']);
    Route::post('/postXoaBai', ['middleware' => ['permission:delete-bai'], 'uses'=>'BaiController@postXoaBai','as'=>'postXoaBai']);

    
    Route::post('/postThemHocPhan', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@postThemHocPhan','as'=>'postThemHocPhan']);
    Route::post('/postTimHocPhanTheoId', ['uses'=>'HocPhanController@postTimHocPhanTheoId','as'=>'postTimHocPhanTheoId']);
    Route::post('/postSuaHocPhan', ['middleware' => ['permission:update-hocphan'], 'uses'=>'HocPhanController@postSuaHocPhan','as'=>'postSuaHocPhan']);
    Route::post('/postXoaHocPhan', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'HocPhanController@postXoaHocPhan','as'=>'postXoaHocPhan']);

    Route::post('/postThemTiet', ['middleware' => ['permission:create-hocphan'], 'uses'=>'EventController@postThemTiet','as'=>'postThemTiet']);
    Route::post('/postTimTietTheoId', ['uses'=>'EventController@postTimTietTheoId','as'=>'postTimTietTheoId']);
    Route::post('/postSuaTiet', ['middleware' => ['permission:update-hocphan'], 'uses'=>'EventController@postSuaTiet','as'=>'postSuaTiet']);
    Route::post('/postXoaTiet', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'EventController@postXoaTiet','as'=>'postXoaTiet']);
});