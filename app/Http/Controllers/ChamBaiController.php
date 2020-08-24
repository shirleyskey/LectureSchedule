<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\ChamBai;

use Carbon\Carbon;
class ChamBaiController extends Controller
{

    public function index()
    {
        return view('chambai.browser.index', ['ds_chambai' => ChamBai::all()]);
    }

    public function create(){
        return view('chambai.add.index', [
            'ds_giangvien' => GiangVien::all(),
        ]);
    }

    public function store(Request $request){
        $chambai = new ChamBai;
        $chambai->id_giangvien = $request->id_giangvien;
        $chambai->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $chambai->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $chambai->thoigian = null;
        }
        try{
            $chambai->save();
            return redirect()->route('chambai.index')->with('status_success', 'Tạo mới Chấm Bài thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('chambai.index')->with('status_error', 'Xảy ra lỗi khi thêm Chấm Bài!');
        }
    }

    public function edit($id){
        return view('chambai.edit.index', [
            'chambai' => ChamBai::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $chambai = ChamBai::saveChamBai($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Chấm Bài');
            return redirect()->route('chambai.index')->with('status_success', 'Chỉnh sửa Thông tin Chấm Bài thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('chambai.index')->with('status_error', 'Xảy ra lỗi khi sửa Chấm Bài!');
        }
        
    }

    public function destroy($id){
        $chambai = ChamBai::findOrFail($id);
       
        try{
            $chambai->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Chấm Bài');
            return redirect()->route('chambai.index')->with('status_success', 'Xóa Chấm Bài thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('chambai.index')->with('status_error', 'Xảy ra lỗi khi xóa Chấm Bài!');
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
     public function postThemChamBai(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $chambai = ChamBai::saveChamBai(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Chấm Bài ID:'.$chambai->id.'-'.$chambai->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimChamBaiTheoId(Request $request){
         $chambai = ChamBai::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $chambai
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaChamBai(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $chambai = ChamBai::saveChamBai($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Chấm Bài ID:'.$chambai->id);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaChamBai(Request $request){
         $chambai = ChamBai::findOrFail($request->input('id'));
         $id = $chambai->id;
         try{
             $chambai->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCKH id:'.$request->input('id').'-'.$chambai->ten);
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
