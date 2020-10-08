<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\DayGioi;
use Carbon\Carbon;
class DayGioiController extends Controller
{
    //AJAX
    public function postThemDayGioi(Request $request)
	{
		if ($request->ajax()) {
            try{
                $daygioi = DayGioi::saveDayGioi(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$daygioi->id.'-'.$daygioi->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimDayGioiTheoId(Request $request){
        $daygioi = DayGioi::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $daygioi
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function postSuaDayGioi(Request $request)
	{
		if ($request->ajax()) {

            try{
                $daygioi = DayGioi::saveDayGioi($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$daygioi->id.'-'.$daygioi->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaDayGioi(Request $request){
        $daygioi = DayGioi::findOrFail($request->input('id'));
        $id = $daygioi->id;
        try{
            $daygioi->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$daygioi->ten);
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
