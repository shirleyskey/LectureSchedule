<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;

use App\HocTap;

use Carbon\Carbon;
class HocTapController extends Controller
{

    //AJAX
    public function postThemHocTap(Request $request)
	{
		if ($request->ajax()) {
            try{
                $hoctap = HocTap::saveHocTap(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$hoctap->id.'-'.$hoctap->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimHocTapTheoId(Request $request){
        $hoctap = HocTap::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $hoctap
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function postSuaHocTap(Request $request)
	{
		if ($request->ajax()) {

            try{
                $hoctap = HocTap::saveHocTap($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$hoctap->id.'-'.$hoctap->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaHocTap(Request $request){
        $hoctap = HocTap::findOrFail($request->input('id'));
        $id = $hoctap->id;
        try{
            $hoctap->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$hoctap->ten);
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
