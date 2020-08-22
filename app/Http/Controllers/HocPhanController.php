<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\HocPhan;
use App\Lop;
use App\Bai;
use App\GiangVien;

class HocPhanController extends Controller
{
    //
    public function index()
    {
        return view('hocphan.browser.index', ['ds_hocphan' => HocPhan::all()]);
    }

    public function read($id)
    {
        $hocphan = HocPhan::findOrFail($id);
        return view('hocphan.read.index', [
            'hocphan' => $hocphan,
            'bai' => Bai::where('id_giangvien', $id)->get(),
        ]);
    }

    public function create(){
        return view('hocphan.add.index', [
            'ds_lop' => Lop::all(),
            // 'ds_ho_so' => HoSo::all()
        ]);
    }

    public function store(Request $request){
        $hocphan = new HocPhan;
        $hocphan->id_lop = $request->id_lop;
        $hocphan->sotiet = $request->sotiet;
        $hocphan->sotinchi = $request->sotinchi;
        $hocphan->tenhocphan = $request->tenhocphan;
        $hocphan->sobai = $request->sobai;
        $hocphan->start = Carbon::parse($request->start)->format('Y-m-d');
        $hocphan->end = Carbon::parse($request->end)->format('Y-m-d');
      
        
        try{
            $hocphan->save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
            return redirect()->route('hocphan.index')->with('status_success', 'Tạo mới Học Phần Chuyên Môn thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.index')->with('status_error', 'Xảy ra lỗi khi thêm Học Phần Chuyên Môn!');
        }
    }

    public function edit($id){
        return view('hocphan.edit.index', [
            'hocphan' => HocPhan::findOrFail($id), 
            'ds_lop' => Lop::all(),
            'ds_giangvien' => GiangVien::where('cothegiang', 1)->get(),
            'bai' => Bai::where('id_hocphan', $id)->get(),
        ]);
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'ten'        => 'unique:nhan_sus,ma_nv,'.$id,
        //     'so_cmnd'        => 'unique:nhan_sus,so_cmnd,'.$id
        // ],[
        //     'ma_nv.unique' => '"Mã nhân viên" đã tồn tại',
        //     'so_cmnd.unique' => '"Số CMND" đã tồn tại'
        // ]);

        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.index')->with('status_success', 'Chỉnh sửa Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi sửa Giảng viên!');
        }
        
    }

    public function destroy($id){
        $giangvien = GiangVien::findOrFail($id);
        $name = $giangvien->ten;
        try{
            $giangvien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa nhân sự id:'.$id.'-'.$name);
            return redirect()->route('giangvien.index')->with('status_success', 'Xóa Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi xóa Giảng Viên!');
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
     public function postThemHocPhan(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $hocphan = HocPhan::saveHocPhan(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimHocPhanTheoId(Request $request){
         $hocphan = HocPhan::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $hocphan
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaHocPhan(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $hocphan = HocPhan::saveHocPhan($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaHocPhan(Request $request){
         $hocphan = HocPhan::findOrFail($request->input('id'));
         $id = $hocphan->id;
         try{
             $hocphan->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$request->input('id').'-'.$hocphan->tenhocphan);
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
