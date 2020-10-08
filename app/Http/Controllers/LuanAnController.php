<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\LuanAn;

class LuanAnController extends Controller
{
    //
      //AJAX
      public function postThemLuanAn(Request $request)
      {
          if ($request->ajax()) {
              try{
                  $luanan = LuanAn::saveLuanAn(0, $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Luanan ID:'.$luanan->id.'-'.$luanan->ten);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postTimLuanAnTheoId(Request $request){
          $luanan = LuanAn::findOrFail($request->input('id'));
              return response()->json([
                  'status' => true,
                  'data'   => $luanan
              ]);
          
          return response()->json([
              'status' => false
          ]); 
      }
  
      public function postSuaLuanAn(Request $request)
      {
          if ($request->ajax()) {
             
              try{
                  $luanan = LuanAn::saveLuanan($request->input('id'), $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Luanan ID:'.$luanan->id.'-'.$luanan->ten);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postXoaLuanAn(Request $request){
          $luanan = LuanAn::findOrFail($request->input('id'));
          $id = $luanan->id;
          try{
              $luanan->delete();
              Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa LUANAN id:'.$request->input('id').'-'.$luanan->ten);
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
