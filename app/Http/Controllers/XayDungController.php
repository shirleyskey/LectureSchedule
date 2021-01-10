<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\XayDung;
use Carbon\Carbon;
class XayDungController extends Controller
{
    //AJAX
    public function postThemXayDung(Request $request)
	{
		if ($request->ajax()) {
            try{
                $xaydung = XayDung::saveXayDung(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Xây Dựng ID:'.$xaydung->id.'-'.$xaydung->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimXayDungTheoId(Request $request){
        $xaydung = XayDung::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $xaydung
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function postSuaXayDung(Request $request)
	{
		if ($request->ajax()) {

            try{
                $xaydung = XayDung::saveXayDung($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Xây Dựng ID:'.$xaydung->id.'-'.$xaydung->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaXayDung(Request $request){
        $xaydung = XayDung::findOrFail($request->input('id'));
        $id = $xaydung->id;
        try{
            $xaydung->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Xây Dựng id:'.$request->input('id').'-'.$xaydung->ten);
            return response()->json([
                'status' => true
            ]);
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => false,
                'data' => 'Xảy ra lỗi trong quá trình xóa Xây Dựng!'
            ]);
        }
    }
    // END AJAX
}
