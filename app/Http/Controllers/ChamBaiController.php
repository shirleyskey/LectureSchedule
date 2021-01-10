<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\ChamBai;
use App\Lop;
use App\HocPhan;

use Carbon\Carbon;
class ChamBaiController extends Controller
{
     //AJAX
     public function postThemChamBai(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $chambai = ChamBai::saveChamBai(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Chấm Bài ID:'.$chambai->id.'-'.$chambai->ten);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postTimChamBaiTheoId(Request $request){
         $chambai = ChamBai::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $chambai
             ]);

         return response()->json([
             'status' => false
         ]);
     }

     public function postSuaChamBai(Request $request)
     {
         if ($request->ajax()) {

             try{
                 $chambai = ChamBai::saveChamBai($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Chấm Bài ID:'.$chambai->id);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }

     public function postXoaChamBai(Request $request){
         $chambai = ChamBai::findOrFail($request->input('id'));
         $id = $chambai->id;
         try{
             $chambai->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Chấm Bài id:'.$request->input('id').'-'.$chambai->ten);
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
