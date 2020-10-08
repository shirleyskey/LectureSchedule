<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Ncs;


class NcsController extends Controller
{
    //
     //AJAX
     public function postThemNcs(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $ncs = Ncs::saveNcs(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Ncs ID:'.$ncs->id.'-'.$ncs->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimNcsTheoId(Request $request){
         $ncs = Ncs::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $ncs
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaNcs(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $ncs = Ncs::saveNcs($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Ncs ID:'.$ncs->id.'-'.$ncs->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaNcs(Request $request){
         $ncs = Ncs::findOrFail($request->input('id'));
         $id = $ncs->id;
         try{
             $ncs->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCS id:'.$request->input('id').'-'.$ncs->ten);
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
