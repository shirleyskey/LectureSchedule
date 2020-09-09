<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\SangKien;
use Carbon\Carbon;
class sangkienController extends Controller
{

    //AJAX
    public function postThemSangKien(Request $request)
	{
		if ($request->ajax()) {
            try{
                $sangkien = SangKien::saveSangKien(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$sangkien->id.'-'.$sangkien->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimSangKienTheoId(Request $request){
        $sangkien = SangKien::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $sangkien
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function postSuaSangKien(Request $request)
	{
		if ($request->ajax()) {

            try{
                $sangkien = SangKien::saveSangKien($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$sangkien->id.'-'.$sangkien->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaSangKien(Request $request){
        $sangkien = SangKien::findOrFail($request->input('id'));
        $id = $sangkien->id;
        try{
            $sangkien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$sangkien->ten);
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
