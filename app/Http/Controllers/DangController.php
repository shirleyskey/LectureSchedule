<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Dang;
use Carbon\Carbon;
class DangController extends Controller
{
     //AJAX
     public function postThemDang(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $dang = Dang::saveDang(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$dang->id.'-'.$dang->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postTimDangTheoId(Request $request){
         $dang = Dang::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $dang
             ]);

         return response()->json([
             'status' => false
         ]);
     }

     public function postSuaDang(Request $request)
     {
         if ($request->ajax()) {

             try{
                 $dang = Dang::saveDang($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$dang->id.'-'.$dang->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postXoaDang(Request $request){
         $dang = Dang::findOrFail($request->input('id'));
         $id = $dang->id;
         try{
             $dang->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCKH id:'.$request->input('id').'-'.$dang->ten);
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
