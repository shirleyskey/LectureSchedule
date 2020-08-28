<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\CongTac;
use Carbon\Carbon;
class CongTacController extends Controller
{

    public function index()
    {
        return view('congtac.browser.index', ['ds_congtac' => CongTac::all()]);
    }

    public function create(){
        return view('congtac.add.index', [
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

        $congtac = new CongTac;
        $congtac->id_giangvien = $request->id_giangvien;
        $congtac->ten = $request->ten;
        $congtac->tiendo = $request->tiendo;
        if($request->thoigian != null){
            $congtac->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $congtac->thoigian = null;
        }
        try{
            $congtac->save();
            return redirect()->route('congtac.index')->with('status_success', 'Tạo mới Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('congtac.index')->with('status_error', 'Xảy ra lỗi khi thêm Công Tác!');
        }
    }

    public function edit($id){
        return view('congtac.edit.index', [
            'congtac' => CongTac::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $congtac = CongTac::saveCongTac($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$congtac->id.'-'.$congtac->ten);
            return redirect()->route('congtac.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('congtac.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $congtac = CongTac::findOrFail($id);
        $name = $congtac->ten;
        try{
            $congtac->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('congtac.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('congtac.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
        }
    }

 
     //AJAX
     public function postThemCongTac(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $congtac = CongTac::saveCongTac(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$congtac->id.'-'.$congtac->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimCongTacTheoId(Request $request){
         $congtac = CongTac::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $congtac
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaCongTac(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $congtac = CongTac::saveCongTac($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công Tác ID:'.$congtac->id.'-'.$congtac->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaCongTac(Request $request){
         $congtac = CongTac::findOrFail($request->input('id'));
         $id = $congtac->id;
         try{
             $congtac->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$request->input('id').'-'.$congtac->ten);
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
