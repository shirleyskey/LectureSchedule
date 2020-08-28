<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\KhoaLuan;

class KhoaLuanController extends Controller
{
    //
     //AJAX
     public function postThemKhoaLuan(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $khoaluan = KhoaLuan::saveKhoaLuan(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Khoaluan ID:'.$khoaluan->id.'-'.$khoaluan->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimKhoaLuanTheoId(Request $request){
         $khoaluan = KhoaLuan::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $khoaluan
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaKhoaLuan(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $khoaluan = Khoaluan::saveKhoaLuan($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Khoaluan ID:'.$khoaluan->id.'-'.$khoaluan->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaKhoaLuan(Request $request){
         $khoaluan = KhoaLuan::findOrFail($request->input('id'));
         $id = $khoaluan->id;
         try{
             $khoaluan->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa KHOALUAN id:'.$request->input('id').'-'.$khoaluan->ten);
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
