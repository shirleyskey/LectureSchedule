<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Bai;
use App\GiangVien;
use App\Tiet;
class BaiController extends Controller
{
    public function index()
    {
        //Lấy ra tất cả danh sách Bài
        return view('bai.browser.index', ['ds_bai' => GiangVien::all()]);
    }

    public function read($id)
    {

        //Xem lại đi, controller này có cần đến không?
        $bai = Bai::findOrFail($id);
        return view('bai.read.index', [
            'bai' => $bai,
            'tiet' => Tiet::where('id_bai', $id)->get(),
        ]);
    }

    public function edit($id){
        $bai = Bai::findOrFail($id);
        return view('bai.edit.index', [
            'bai' => $bai, 
            'tiet' => Tiet::where('id_bai', $id)->get(),
            'ds_giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $bai = Bai::saveBai($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Bài Học:'.$bai->id);
            return redirect()->route('hocphan.edit.get', $bai->hocphans->id)->with('status_success', 'Chỉnh sửa Thông tin Bài thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.edit.get', $bai->hocphans->id)->with('status_error', 'Xảy ra lỗi khi sửa Bài!');
        }
        
    }

     //AJAX
     public function postThemBai(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $bai = Bai::saveBai(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Bài ID:'.$bai->id.'-'.$bai->tenbai);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimBaiTheoId(Request $request){
         $bai = Bai::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $bai
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaBai(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $bai = Bai::saveBai($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Bài ID:'.$bai->id.'-'.$bai->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaBai(Request $request){
         $bai = Bai::findOrFail($request->input('id'));
         $id = $bai->id;
         try{
             $bai->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Bài id:'.$request->input('id').'-'.$bai->tenbai);
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
