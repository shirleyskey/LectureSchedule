<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bai;
use App\Event;
use App\GiangVien;
class BaiController extends Controller
{
    //
    public function index()
    {
        return view('bai.browser.index', ['ds_bai' => GiangVien::all()]);
    }

    public function read($id)
    {
        $bai = Bai::findOrFail($id);
        return view('bai.read.index', [
            'bai' => $bai,
            'tiet' => Event::where('id_bai', $id)->get(),
        ]);
    }

    public function edit($id){
        return view('bai.edit.index', [
            'bai' => Bai::findOrFail($id), 
            'tiet' => Event::where('id_bai', $id)->get(),
            'ds_giangvien' => GiangVien::all(),
        ]);
    }

     //AJAX
     public function postThemNck(Request $request)
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
                 $nckh = Nckh::saveNckh(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$nckh->id.'-'.$nckh->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimNckhTheoId(Request $request){
         $nckh = Nckh::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $nckh
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaNckh(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $nckh = Nckh::saveNckh($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$nckh->id.'-'.$nckh->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaNckh(Request $request){
         $nckh = Nckh::findOrFail($request->input('id'));
         $id = $nckh->id;
         try{
             $nckh->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCKH id:'.$request->input('id').'-'.$nckh->ten);
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
