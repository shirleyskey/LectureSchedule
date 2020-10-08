<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LuanVan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LuanVanController extends Controller
{
    //
     //AJAX
     public function postThemLuanVan(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $luanvan = LuanVan::saveLuanvan(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Luanvan ID:'.$luanvan->id.'-'.$luanvan->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimLuanVanTheoId(Request $request){
         $luanvan = LuanVan::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $luanvan
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaLuanVan(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $luanvan = LuanVan::saveLuanvan($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Luanvan ID:'.$luanvan->id.'-'.$luanvan->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaLuanVan(Request $request){
         $luanvan = LuanVan::findOrFail($request->input('id'));
         $id = $luanvan->id;
         try{
             $luanvan->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa LUANVAN id:'.$request->input('id').'-'.$luanvan->ten);
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
