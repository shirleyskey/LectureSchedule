<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Tiet;
use App\Bai;
use Carbon\Carbon;

class TietController extends Controller
{
    //
      //Calendar 
      public function edit($id){
        $tiet = Tiet::findOrFail($id);
        $id_hocphan = $tiet->hocphans->id;
        $bai = Bai::where('id_hocphan', $id_hocphan)->get();
        return view('calendar.calendar-edit', [
            'tiet' => $tiet,
            'bai' => $bai
        ]);
    }

     public function update(Request $request, $id){
        try{
            $tiet = Tiet::saveTiet($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Tiết Học:'.$tiet->id);
            return redirect()->route('bai.edit.post', $tiet->id_bai)->with('status_success', 'Chỉnh sửa Thông tin Tiết Học!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('bai.edit.post', $tiet->id_bai)->with('status_error', 'Xảy ra lỗi khi sửa Tiết Học!');
        }
        
    }
}
