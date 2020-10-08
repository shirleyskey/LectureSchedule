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
