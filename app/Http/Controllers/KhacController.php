<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\ChamBai;
use App\CongTac;
use App\Dang;
use App\DayGioi;
use App\HocTap;
use App\Nckh;
use App\XayDung;
use App\Lop;
use App\Hop;
use App\HocPhan;
use App\VanBan;
use App\Hdkh;
class KhacController extends Controller
{
    //
    public function edit(){
        return view('khac.edit.index', [
            'giangvien' => GiangVien::all(), 
            'chambai' => ChamBai::all(),
            'congtac' => CongTac::all(),
            'dang' => Dang::all(),
            'daygioi' => DayGioi::all(),
            'hoctap' => HocTap::all(),
            'nckh' => Nckh::all(),
            'xaydung' => XayDung::all(),
            'lop' => Lop::all(),
            'hocphan' => HocPhan::all(),
            'hop' => Hop::all(),
            'vanban' => VanBan::all(),
            'hdkh' => Hdkh::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Hoạt Động Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.index')->with('status_success', 'Chỉnh sửa Hoạt Động Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi sửa Hoạt Động Giảng viên!');
        }
        
    }
}
