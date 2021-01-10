<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Hop;
use Carbon\Carbon;

class HopController extends Controller
{
    //
     //AJAX
     public function postThemHop(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $hop = hop::saveHop(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Cuộc Họp ID:'.$hop->id.'-'.$hop->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postTimHopTheoId(Request $request){
         $hop = Hop::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $hop
             ]);

         return response()->json([
             'status' => false
         ]);
     }

     public function postSuahop(Request $request)
     {
         if ($request->ajax()) {

             try{
                 $hop = Hop::saveHop($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Cuộc Họp ID:'.$hop->id.'-'.$hop->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postXoaHop(Request $request){
         $hop = Hop::findOrFail($request->input('id'));
         $id = $hop->id;
         try{
             $hop->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Cuộc Họp id:'.$request->input('id').'-'.$hop->ten);
             return response()->json([
                 'status' => true
             ]);
         }
         catch(\Exception $e){
             Log::error($e);
             return response()->json([
                 'status' => false,
                 'data' => 'Xảy ra lỗi trong quá trình xóa Cuộc Họp!'
             ]);
         }
     }
     // END AJAX

}
