<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\DotXuat;
use Carbon\Carbon;
class DotXuatController extends Controller
{

    public function index()
    {
        return view('dotxuat.browser.index', ['ds_dotxuat' => DotXuat::all()]);
    }

    public function create(){
        return view('dotxuat.add.index', [
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

        $dotxuat = new DotXuat;
        $dotxuat->id_giangvien = $request->id_giangvien;
        $dotxuat->ten = $request->ten;
        $dotxuat->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $dotxuat->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $dotxuat->thoigian = null;
        }
        try{
            $dotxuat->save();
            return redirect()->route('dotxuat.index')->with('status_success', 'Tạo mới Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dotxuat.index')->with('status_error', 'Xảy ra lỗi khi thêm Công Tác!');
        }
    }

    public function edit($id){
        return view('dotxuat.edit.index', [
            'dotxuat' => DotXuat::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $dotxuat = DotXuat::saveDotXuat($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$dotxuat->id.'-'.$dotxuat->ten);
            return redirect()->route('dotxuat.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dotxuat.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $dotxuat = DotXuat::findOrFail($id);
        $name = $dotxuat->ten;
        try{
            $dotxuat->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('dotxuat.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('dotxuat.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
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
     public function postThemDotXuat(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $dotxuat = DotXuat::saveDotXuat(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Xây Dựng ID:'.$dotxuat->id.'-'.$dotxuat->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimDotXuatTheoId(Request $request){
         $dotxuat = DotXuat::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $dotxuat
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaDotXuat(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $dotxuat = DotXuat::saveDotXuat($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Xây Dựng ID:'.$dotxuat->id.'-'.$dotxuat->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaDotXuat(Request $request){
         $dotxuat = DotXuat::findOrFail($request->input('id'));
         $id = $dotxuat->id;
         try{
             $dotxuat->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Xây Dựng id:'.$request->input('id').'-'.$dotxuat->ten);
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
