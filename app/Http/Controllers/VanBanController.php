<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\VanBan;
use Carbon\Carbon;

class VanBanController extends Controller
{
    //
    //AJAX
    public function postThemVanBan(Request $request)
    {
        if ($request->ajax()) {
            try{
                $vanban = VanBan::saveVanBan(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$vanban->id.'-'.$vanban->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
        }
    }

    public function postTimVanBanTheoId(Request $request){
        $vanban = VanBan::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $vanban
            ]);

        return response()->json([
            'status' => false
        ]);
    }

    public function postSuaVanBan(Request $request)
    {
        if ($request->ajax()) {

            try{
                $vanban = VanBan::saveVanBan($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công Tác ID:'.$vanban->id.'-'.$vanban->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
        }
    }

    public function postXoaVanBan(Request $request){
        $vanban = VanBan::findOrFail($request->input('id'));
        $id = $vanban->id;
        try{
            $vanban->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$request->input('id').'-'.$vanban->ten);
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
