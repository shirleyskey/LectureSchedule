<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TuanController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();
        $t2= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->format('Y-m-d')." 23:59:59.000000"))->get();
        $t3= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(1)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(1)->format('Y-m-d')." 23:59:59.000000"))->get();
        $t4= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(2)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(2)->format('Y-m-d')." 23:59:59.000000"))->get();
        $t5= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(3)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(3)->format('Y-m-d')." 23:59:59.000000"))->get();
        $t6= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(4)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(4)->format('Y-m-d')." 23:59:59.000000"))->get();
        $t7= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(5)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(5)->format('Y-m-d')." 23:59:59.000000"))->get();
        $t8= Tuan::whereBetween('thoi_gian',array($now->startOfWeek()->addDays(6)->format('Y-m-d')." 00:00:00.000000", $now->startOfWeek()->addDays(6)->format('Y-m-d')." 23:59:59.000000"))->get();
        // dd($t2);
        return view('tuan.tuan', 
        [
            't2' => $t2,
            't3' => $t3,
            't4' => $t4,
            't5' => $t5,
            't6' => $t6,
            't7' => $t7,
            't8' => $t8,
            'ds_tuan' => Tuan::all(),
            ]);
    }

      //AJAX
      public function postThemTuan(Request $request)
      {
          if ($request->ajax()) {
              try{
                  $tuan = Tuan::saveTuan(0, $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm lịch Tuần ID:'.$tuan->id.'-'.$tuan->title);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postTimTuanTheoId(Request $request){
          $tuan = Tuan::findOrFail($request->input('id'));
          $tuan->thoi_gian = Carbon::parse($tuan->thoi_gian)->format('Y-m-d\TH:i');
              return response()->json([
                  'status' => true,
                  'data'   => $tuan
              ]);
          
          return response()->json([
              'status' => false
          ]); 
      }
  
      public function postSuaTuan(Request $request)
      {
          if ($request->ajax()) {
             
              try{
                  $tuan = Tuan::saveTuan($request->input('id'), $request->all());
                  Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Tuần ID:'.$tuan->id.'-'.$tuan->noi_dung);
                  return response()->json([
                      'status' => true
                  ]);
              }
              catch(\Exception $e){
                  Log::error($e);
              }
          }
      }
  
      public function postXoaTuan(Request $request){
          $tuan = Tuan::findOrFail($request->input('id'));
          $id = $tuan->id;
          try{
              $tuan->delete();
              Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Lịch Tuần id:'.$request->input('id').'-'.$tuan->noi_dung);
              return response()->json([
                  'status' => true
              ]);
          }
          catch(\Exception $e){
              Log::error($e);
              return response()->json([
                  'status' => false,
                  'data' => 'Xảy ra lỗi trong quá trình xóa Lịch Tuần!'
              ]);
          }
      }
      // END AJAX
}
