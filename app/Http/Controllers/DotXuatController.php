<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\DotXuat;
use Carbon\Carbon;
class DotXuatController extends Controller
{
     //AJAX
     public function postThemDotXuat(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $dotxuat = DotXuat::saveDotXuat(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Xây Dựng ID:'.$dotxuat->id.'-'.$dotxuat->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postTimDotXuatTheoId(Request $request){
         $dotxuat = DotXuat::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $dotxuat
             ]);

         return response()->json([
             'status' => false
         ]);
     }

     public function postSuaDotXuat(Request $request)
     {
         if ($request->ajax()) {

             try{
                 $dotxuat = DotXuat::saveDotXuat($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Xây Dựng ID:'.$dotxuat->id.'-'.$dotxuat->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postXoaDotXuat(Request $request){
         $dotxuat = DotXuat::findOrFail($request->input('id'));
         $id = $dotxuat->id;
         try{
             $dotxuat->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Xây Dựng id:'.$request->input('id').'-'.$dotxuat->ten);
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
