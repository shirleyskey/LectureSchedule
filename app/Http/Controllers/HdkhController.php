<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Hdkh;

class HdkhController extends Controller
{
    //
     //AJAX
     public function postThemHdkh(Request $request)
     {
         
         if ($request->ajax()) {
             try{
                 $hdkh = Hdkh::saveHdkh(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm hdkh ID:'.$hdkh->id);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
         else {
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm hdkh thất bại:');
         }
     }
 
     public function postTimHdkhTheoId(Request $request){
         $hdkh = Hdkh::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $hdkh
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaHdkh(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $hdkh = Hdkh::saveHdkh($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa hdkh ID:'.$hdkh->id.'-'.$hdkh->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaHdkh(Request $request){
         $hdkh = Hdkh::findOrFail($request->input('id'));
         $id = $hdkh->id;
         try{
             $hdkh->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa hdkh id:'.$request->input('id').'-');
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
