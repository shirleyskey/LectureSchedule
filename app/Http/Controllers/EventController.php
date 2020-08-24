<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Event;
use Carbon\Carbon;
class EventController extends Controller
{
      //AJAX
      public function postThemTiet(Request $request)
      {
          if ($request->ajax()) {
              try{
                  $tiet = Event::saveTiet(0, $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Tiết Học ID:'.$tiet->id.'-'.$tiet->title);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postTimTietTheoId(Request $request){
          $tiet = Event::findOrFail($request->input('id'));
          $tiet->start = Carbon::parse($tiet->start)->format('Y-m-d\TH:i:s');
          $tiet->end = Carbon::parse($tiet->end)->format('Y-m-d\TH:i:s');
              return response()->json([
                  'status' => true,
                  'data'   => $tiet
              ]);
          
          return response()->json([
              'status' => false
          ]); 
      }
  
      public function postSuaTiet(Request $request)
      {
          if ($request->ajax()) {
             
              try{
                  $tiet = Event::saveTiet($request->input('id'), $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Học Phần ID:'.$tiet->id.'-'.$tiet->title);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postXoaTiet(Request $request){
          $tiet = Event::findOrFail($request->input('id'));
          $id = $tiet->id;
          try{
              $tiet->delete();
              Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$request->input('id').'-'.$tiet->title);
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
