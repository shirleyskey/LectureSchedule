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
});

// File Manager
Route::prefix('file-manager')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-file-manager'], 'uses'=>'FileManagerController@index','as'=>'file-manager.index']);
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
    Route::post('/import', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@import','as'=>'giangvien.import']);
    Route::get('/export', ['middleware' => ['permission:create-giangvien'], 'uses'=>'GiangVienController@export','as'=>'giangvien.export']);
});

// Sửa Profile Routes...
Route::prefix('profile')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/lichtrinh/{id}', ['uses' =>'ThongBaoController@index','as'=>'profile.thongbao.get']);
    Route::get('/edit/{id}', ['uses' =>'ProfileController@edit','as'=>'profile.edit.get']);
    Route::post('/edit/{id}', ['uses'=>'ProfileController@update','as'=>'profile.edit.post']);
});

// Công Việc Khác Routes...
Route::prefix('khac')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/edit', ['uses' =>'KhacController@edit','as'=>'khac.edit.get']);

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
    Route::post('/import/{id}', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'HocPhanController@import','as'=>'hocphan.lichgiang.import']);
});

// Học Phần Routes...
Route::prefix('bai')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/read/{id}', ['middleware' => ['permission:read-bai'], 'uses'=>'BaiController@read','as'=>'bai.read.get']);
    Route::get('/add', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@create','as'=>'bai.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-bai'], 'uses'=>'BaiController@store','as'=>'bai.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-bai'], 'uses' =>'BaiController@edit','as'=>'bai.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-bai'], 'uses'=>'BaiController@update','as'=>'bai.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-bai'], 'uses'=>'BaiController@destroy','as'=>'bai.delete.get']);

});

//Lịch Giảng
Route::prefix('lichgiang')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/phancong', ['uses'=>'LichGiangController@phancong','as'=>'lichgiang.phancong']);
    Route::get('/lichgiangtuan', ['uses'=>'CalendarController@index','as'=>'lichgiang.lichgiangtuan']);
    Route::post('/lichgiangtuan/import', ['uses'=>'CalendarController@import','as'=>'lichgiang.lichgiangtuan.import']);
    Route::get('/lichgiangtuan/edit/{id}', ['uses'=>'TietController@edit','as'=>'lichgiang.lichgiangtuan.get']);
    Route::post('/lichgiangtuan/edit/{id}', ['uses'=>'EventController@update','as'=>'lichgiang.lichgiangtuan.post']);
});

// NCKH Routes...
Route::prefix('nckh')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::get('/', ['middleware' => ['permission:read-nckh'], 'uses'=>'NckhController@index','as'=>'nckh.index']);
    Route::get('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@create','as'=>'nckh.add.get']);
    Route::post('/add', ['middleware' => ['permission:create-nckh'], 'uses'=>'NckhController@store','as'=>'nckh.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses' =>'NckhController@edit','as'=>'nckh.edit.get']);
    Route::post('/edit/{id}', ['middleware' => ['permission:update-nckh'], 'uses'=>'NckhController@update','as'=>'nckh.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:delete-nckh'], 'uses'=>'NckhController@destroy','as'=>'nckh.delete.get']);

});


// Ajax Routes...
Route::prefix('ajax')->middleware(['auth', 'only_active_user'])->group(function () {
    Route::post('/dsGiangVien', ['uses'=>'CongTacController@dsGiangVien','as'=>'dsGiangVien']);
    Route::post('/postThemNckh', ['uses'=>'NckhController@postThemNckh','as'=>'postThemNckh']);
    Route::post('/postTimNckhTheoId', ['uses'=>'NckhController@postTimNckhTheoId','as'=>'postTimNckhTheoId']);
    Route::post('/postSuaNckh', ['uses'=>'NckhController@postSuaNckh','as'=>'postSuaNckh']);
    Route::post('/postXoaNckh', ['uses'=>'NckhController@postXoaNckh','as'=>'postXoaNckh']);

    Route::post('/postThemCongTac', ['uses'=>'CongTacController@postThemCongTac','as'=>'postThemCongTac']);
    Route::post('/postTimCongTacTheoId', ['uses'=>'CongTacController@postTimCongTacTheoId','as'=>'postTimCongTacTheoId']);
    Route::post('/postSuaCongTac', ['uses'=>'CongTacController@postSuaCongTac','as'=>'postSuaCongTac']);
    Route::post('/postXoaCongTac', ['uses'=>'CongTacController@postXoaCongTac','as'=>'postXoaCongTac']);

    Route::post('/postThemChamBai', ['uses'=>'ChamBaiController@postThemChamBai','as'=>'postThemChamBai']);
    Route::post('/postTimChamBaiTheoId', ['uses'=>'ChamBaiController@postTimChamBaiTheoId','as'=>'postTimChamBaiTheoId']);
    Route::post('/postSuaChamBai', ['uses'=>'ChamBaiController@postSuaChamBai','as'=>'postSuaChamBai']);
    Route::post('/postXoaChamBai', ['uses'=>'ChamBaiController@postXoaChamBai','as'=>'postXoaChamBai']);

    Route::post('/postThemDang', ['uses'=>'DangController@postThemDang','as'=>'postThemDang']);
    Route::post('/postTimDangTheoId', ['uses'=>'DangController@postTimDangTheoId','as'=>'postTimDangTheoId']);
    Route::post('/postSuaDang', ['uses'=>'DangController@postSuaDang','as'=>'postSuaDang']);
    Route::post('/postXoaDang', ['uses'=>'DangController@postXoaDang','as'=>'postXoaDang']);

    Route::post('/postThemDayGioi', ['uses'=>'DayGioiController@postThemDayGioi','as'=>'postThemDayGioi']);
    Route::post('/postTimDayGioiTheoId', ['uses'=>'DayGioiController@postTimDayGioiTheoId','as'=>'postTimDayGioiTheoId']);
    Route::post('/postSuaDayGioi', ['uses'=>'DayGioiController@postSuaDayGioi','as'=>'postSuaDayGioi']);
    Route::post('/postXoaDayGioi', ['uses'=>'DayGioiController@postXoaDayGioi','as'=>'postXoaDayGioi']);

    Route::post('/postThemXayDung', ['uses'=>'XayDungController@postThemXayDung','as'=>'postThemXayDung']);
    Route::post('/postTimXayDungTheoId', ['uses'=>'XayDungController@postTimXayDungTheoId','as'=>'postTimXayDungTheoId']);
    Route::post('/postSuaXayDung', ['uses'=>'XayDungController@postSuaXayDung','as'=>'postSuaXayDung']);
    Route::post('/postXoaXayDung', ['uses'=>'XayDungController@postXoaXayDung','as'=>'postXoaXayDung']);

    Route::post('/postThemDotXuat', ['uses'=>'DotXuatController@postThemDotXuat','as'=>'postThemDotXuat']);
    Route::post('/postTimDotXuatTheoId', ['uses'=>'DotXuatController@postTimDotXuatTheoId','as'=>'postTimDotXuatTheoId']);
    Route::post('/postSuaDotXuat', ['uses'=>'DotXuatController@postSuaDotXuat','as'=>'postSuaDotXuat']);
    Route::post('/postXoaDotXuat', ['uses'=>'DotXuatController@postXoaDotXuat','as'=>'postXoaDotXuat']);

    //Route Họp 
    Route::post('/postThemHop', ['uses'=>'HopController@postThemHop','as'=>'postThemHop']);
    Route::post('/postTimHopTheoId', ['uses'=>'HopController@postTimHopTheoId','as'=>'postTimHopTheoId']);
    Route::post('/postSuaHop', ['uses'=>'HopController@postSuaHop','as'=>'postSuaHop']);
    Route::post('/postXoaHop', ['uses'=>'HopController@postXoaHop','as'=>'postXoaHop']);

    Route::post('/postThemSangKien', ['uses'=>'SangKienController@postThemSangKien','as'=>'postThemSangKien']);
    Route::post('/postTimSangKienTheoId', ['uses'=>'SangKienController@postTimSangKienTheoId','as'=>'postTimSangKienTheoId']);
    Route::post('/postSuaSangKien', ['uses'=>'SangKienController@postSuaSangKien','as'=>'postSuaSangKien']);
    Route::post('/postXoaSangKien', ['uses'=>'SangKienController@postXoaSangKien','as'=>'postXoaSangKien']);

    Route::post('/postThemHocTap', ['uses'=>'HocTapController@postThemHocTap','as'=>'postThemHocTap']);
    Route::post('/postTimHocTapTheoId', ['uses'=>'HocTapController@postTimHocTapTheoId','as'=>'postTimHocTapTheoId']);
    Route::post('/postSuaHocTap', ['uses'=>'HocTapController@postSuaHocTap','as'=>'postSuaHocTap']);
    Route::post('/postXoaHocTap', ['uses'=>'HocTapController@postXoaHocTap','as'=>'postXoaHocTap']);

    Route::post('/postThemBai', ['uses'=>'BaiController@postThemBai','as'=>'postThemBai']);
    Route::post('/postTimBaiTheoId', ['uses'=>'BaiController@postTimBaiTheoId','as'=>'postTimBaiTheoId']);
    Route::post('/postSuaBai', ['uses'=>'BaiController@postSuaBai','as'=>'postSuaBai']);
    Route::post('/postXoaBai', ['uses'=>'BaiController@postXoaBai','as'=>'postXoaBai']);


    Route::post('/postThemHocPhan', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HocPhanController@postThemHocPhan','as'=>'postThemHocPhan']);
    Route::post('/postTimHocPhanTheoId', ['uses'=>'HocPhanController@postTimHocPhanTheoId','as'=>'postTimHocPhanTheoId']);
    Route::post('/postSuaHocPhan', ['middleware' => ['permission:update-hocphan'], 'uses'=>'HocPhanController@postSuaHocPhan','as'=>'postSuaHocPhan']);
    Route::post('/postXoaHocPhan', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'HocPhanController@postXoaHocPhan','as'=>'postXoaHocPhan']);

    Route::post('/postThemTiet', ['middleware' => ['permission:create-hocphan'], 'uses'=>'EventController@postThemTiet','as'=>'postThemTiet']);
    Route::post('/postTimTietTheoId', ['uses'=>'EventController@postTimTietTheoId','as'=>'postTimTietTheoId']);
    Route::post('/postSuaTiet', ['middleware' => ['permission:update-hocphan'], 'uses'=>'EventController@postSuaTiet','as'=>'postSuaTiet']);
    Route::post('/postXoaTiet', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'EventController@postXoaTiet','as'=>'postXoaTiet']);

    //Khoa Luan
    Route::post('/postThemKhoaLuan', ['middleware' => ['permission:create-hocphan'], 'uses'=>'KhoaLuanController@postThemKhoaLuan','as'=>'postThemKhoaLuan']);
    Route::post('/postTimKhoaLuanTheoId', ['uses'=>'KhoaLuanController@postTimKhoaLuanTheoId','as'=>'postTimKhoaLuanTheoId']);
    Route::post('/postSuaKhoaLuan', ['middleware' => ['permission:update-hocphan'], 'uses'=>'KhoaLuanController@postSuaKhoaLuan','as'=>'postSuaKhoaLuan']);
    Route::post('/postXoaKhoaLuan', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'KhoaLuanController@postXoaKhoaLuan','as'=>'postXoaKhoaLuan']);

    //Luan Van
    Route::post('/postThemLuanVan', ['middleware' => ['permission:create-hocphan'], 'uses'=>'LuanVanController@postThemLuanVan','as'=>'postThemLuanVan']);
    Route::post('/postTimLuanVanTheoId', ['uses'=>'LuanVanController@postTimLuanVanTheoId','as'=>'postTimLuanVanTheoId']);
    Route::post('/postSuaLuanVan', ['middleware' => ['permission:update-hocphan'], 'uses'=>'LuanVanController@postSuaLuanVan','as'=>'postSuaLuanVan']);
    Route::post('/postXoaLuanVan', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'LuanVanController@postXoaLuanVan','as'=>'postXoaLuanVan']);

    //Luan An
    Route::post('/postThemLuanAn', ['middleware' => ['permission:create-hocphan'], 'uses'=>'LuanAnController@postThemLuanAn','as'=>'postThemLuanAn']);
    Route::post('/postTimLuanAnTheoId', ['uses'=>'LuanAnController@postTimLuanAnTheoId','as'=>'postTimLuanAnTheoId']);
    Route::post('/postSuaLuanAn', ['middleware' => ['permission:update-hocphan'], 'uses'=>'LuanAnController@postSuaLuanAn','as'=>'postSuaLuanAn']);
    Route::post('/postXoaLuanAn', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'LuanAnController@postXoaLuanAn','as'=>'postXoaLuanAn']);

    //NCS
    Route::post('/postThemNcs', ['middleware' => ['permission:create-hocphan'], 'uses'=>'NcsController@postThemNcs','as'=>'postThemNcs']);
    Route::post('/postTimNcsTheoId', ['uses'=>'NcsController@postTimNcsTheoId','as'=>'postTimNcsTheoId']);
    Route::post('/postSuaNcs', ['middleware' => ['permission:update-hocphan'], 'uses'=>'NcsController@postSuaNcs','as'=>'postSuaNcs']);
    Route::post('/postXoaNcs', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'NcsController@postXoaNcs','as'=>'postXoaNcs']);

    //NCS
    Route::post('/postThemHdkh', ['middleware' => ['permission:create-hocphan'], 'uses'=>'HdkhController@postThemHdkh','as'=>'postThemHdkh']);
    Route::post('/postTimHdkhTheoId', ['uses'=>'HdkhController@postTimHdkhTheoId','as'=>'postTimHdkhTheoId']);
    Route::post('/postSuaHdkh', ['middleware' => ['permission:update-hocphan'], 'uses'=>'HdkhController@postSuaHdkh','as'=>'postSuaHdkh']);
    Route::post('/postXoaHdkh', ['middleware' => ['permission:delete-hocphan'], 'uses'=>'HdkhController@postXoaHdkh','as'=>'postXoaHdkh']);
});
