<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\ChamBai;
use App\Dang;
use App\DayGioi;
use App\DotXuat;
use App\HocTap;
use App\Nckh;
use App\SangKien;
use App\XayDung;
use Carbon\Carbon;
class DangController extends Controller
{

    public function index()
    {
        return view('dang.browser.index', ['ds_dang' => Dang::all()]);
    }

    public function create(){
        return view('dang.add.index', [
            'ds_giangvien' => GiangVien::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'id_giangvien'     => 'required',
            'ten'    => 'required',
            
        ],[
            'id_giangvien.required'     => 'Bạn chưa chọn "Giảng Viên"',
            'ten.required'    => 'Bạn chưa nhập "Tên công tác"',
        ]);

        $dang = new Dang;
        $dang->id_giangvien = $request->id_giangvien;
        $dang->ten = $request->ten;
        if($request->thoigian != null){
            $dang->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $dang->thoigian = null;
        }
        try{
            $dang->save();
            return redirect()->route('dang.index')->with('status_success', 'Tạo mới Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dang.index')->with('status_error', 'Xảy ra lỗi khi thêm Công Tác!');
        }
    }

    public function edit($id){
        return view('dang.edit.index', [
            'dang' => Dang::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'ma_nv'        => 'unique:nhan_sus,ma_nv,'.$id,
        //     'so_cmnd'        => 'unique:nhan_sus,so_cmnd,'.$id
        // ],[
        //     'ma_nv.unique' => '"Mã nhân viên" đã tồn tại',
        //     'so_cmnd.unique' => '"Số CMND" đã tồn tại'
        // ]);

        try{
            $dang = Dang::savedang($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$dang->id.'-'.$dang->ten);
            return redirect()->route('dang.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dang.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $dang = Dang::findOrFail($id);
        $name = $dang->ten;
        try{
            $dang->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('dang.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dang.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
        }
    }

    public function importExcel(){
        return view('giangvien.import.index');
    }

    public function postImportExcel(Request $request){
        // if($request->input('excel_link')){
        //     if(file_exists(storage_path('app/'.$request->input('excel_link')))){

        //         $file_ext = pathinfo(storage_path('app/'.$request->input('excel_link')), PATHINFO_EXTENSION);

        //         if($file_ext == 'xlsx' || $file_ext == 'xls' || $file_ext == 'csv'){
        //             $collection = (new FastExcel)->import(storage_path('app/'.$request->input('excel_link')));
    
        //             if($collection->count() > 0 ){
        //                 // dd($collection);
        //                 $trung_ma_nv = '';
        //                 $trung_so_cmnd = '';
        //                 $count = 0;
        //                 foreach($collection as $k => $v){
        //                     if(!NhanSu::where('ma_nv', $v['ma_nv'])->exists()){
        //                         if(!NhanSu::where('so_cmnd', $v['so_cmnd'])->exists()){
        //                             NhanSu::saveNhanSu(-1, $v);
        //                         }else{
        //                             $count++;
        //                             $trung_so_cmnd .= $v['ma_nv'] . '|';
        //                         }
        //                     }else{
        //                         $count++;
        //                         $trung_ma_nv .= $v['ma_nv'] . '|';
        //                     }
        //                 }
                        
        //                 return response()
        //                     ->json([
        //                         'result' => true,
        //                         'message' => 'Nhập liệu thành công!',
        //                         'data' => [
        //                             'count' => $count,
        //                             'trung_ma_nv' => $trung_ma_nv,
        //                             'trung_so_cmnd' => $trung_so_cmnd
        //                         ]
        //                     ]);
                        
        //             }else{
        //                 return response()->json([
        //                         'result' => false,
        //                         'message' => 'Tập tin rỗng!'
        //                     ]);
        //             }
        //         }else{
        //             return response()->json([
        //                 'result' => false,
        //                 'message' => 'Định dạng file không đúng!'
        //             ]);
        //         }
                
        //     }else{
        //         return response()->json([
        //                 'result' => false,
        //                 'message' => 'Tập tin không tồn tại!'
        //             ]);
        //     }
        // }else{
        //     return response()->json([
        //                 'result' => false,
        //                 'message' => 'Vui lòng chọn tệp tin!'
        //             ]);
        // }
    }

    public function exportExcel(){
        // $nhan_su = NhanSu::all();

        // // Xử lý hồ sơ nhân viên
        // foreach($nhan_su as $v){
        //     $nhan_su_hs = '';
        //     // $hoso_id = json_decode($v->hoso_id);
        //     $hoso_id = explode(",", $v->hoso_id);
        //     foreach( $hoso_id as $k2 => $v2 ){
        //         if ($v2 === end($hoso_id)) {
        //             $nhan_su_hs .= HoSo::getNameById($v2);
        //         }else{
        //             $nhan_su_hs .= HoSo::getNameById($v2) .', ';
        //         }
        //     }
        //     $v->hoso_id = $nhan_su_hs;
        // }
        
        // return (new FastExcel($nhan_su))->download('ds_nhan_su.xlsx', function($nhan_su){
        //     $array_export = [
        //         'Mã NV' => $nhan_su->ma_nv,              
        //         'Họ tên' => $nhan_su->ho_ten,             
        //         'Địa chỉ thường trú' => $nhan_su->dia_chi_thuong_tru, 
        //         'Địa chỉ liên hệ' => $nhan_su->dia_chi_lien_he,    
        //         'Điện thoại' => $nhan_su->dien_thoai,         
        //         'Email' => $nhan_su->email,             
        //         'Giới tính' => ($nhan_su->gioi_tinh == 1) ? 'Nam' : 'Nữ',          
        //         'Ngày sinh' => $nhan_su->ngay_sinh,        
        //         'Số CMND' => $nhan_su->so_cmnd,           
        //         'Ngày cấp CMND' => $nhan_su->ngay_cap_cmnd,     
        //         'Nơi cấp CMND' => $nhan_su->noi_cap_cmnd,       
        //         'Ngày bắt đầu làm' => $nhan_su->ngay_bat_dau_lam,  
        //         'Ngày làm việc cuối' => $nhan_su->ngay_lam_viec_cuoi,   
        //         'Trình độ' => $nhan_su->trinh_do,          
        //         'Trường tốt nghiệp' => $nhan_su->truong_tot_nghiep,  
        //         'Năm tốt nghiệp' => $nhan_su->nam_tot_nghiep,   
        //         'Chứng chỉ' => $nhan_su->chung_chi,        
        //         'Chức danh' => $nhan_su->chuc_danh,        
        //         'Phòng ban' => ($nhan_su->phongban_id != 0) ? $nhan_su->phongbans->ten : '',       
        //         'Bộ phận' => ($nhan_su->bophan_id != 0) ? $nhan_su->bophans->ten : '',   
        //         'Hồ sơ' => $nhan_su->hoso_id,   
        //         'Trạng thái' => ($nhan_su->trang_thai == 1)?'Đang làm việc':'Thôi việc'
        //     ];
            
        //     return $array_export;
        // });
    }

     //AJAX
     public function postThemDang(Request $request)
     {
         if ($request->ajax()) {
             // echo "Shi shi";
             // $validator = Validator::make($request->all(), [
             //     'ten'  => 'required',
             // ],[
             //     'ten.required' => 'Vui lòng nhập Tên NCKH',
             // ]);
             // if($validator->fails()){
             //     return response()->json([
             //         'status' => false,
             //         'data'   => $validator->errors()
             //     ]);
             // }
 
             try{
                 $dang = Dang::saveDang(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$dang->id.'-'.$dang->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimDangTheoId(Request $request){
         $dang = Dang::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $dang
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaDang(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $dang = Dang::saveDang($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$dang->id.'-'.$dang->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaDang(Request $request){
         $dang = Dang::findOrFail($request->input('id'));
         $id = $dang->id;
         try{
             $dang->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCKH id:'.$request->input('id').'-'.$dang->ten);
             return response()->json([
                 'status' => true
             ]);
         }
         catch(\Exception $e){
             Log::error($e);
             return response()->json([
                 'status' => false,
                 'data' => 'Xảy ra lỗi trong quá trình xóa!'
             ]);
         }
     }
     // END AJAX
}
