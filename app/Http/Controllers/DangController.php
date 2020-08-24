<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Dang;
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
       
    }

    public function exportExcel(){
       
    }

     //AJAX
     public function postThemDang(Request $request)
     {
         if ($request->ajax()) {
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
