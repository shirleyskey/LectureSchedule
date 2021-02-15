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
        // Họp 
        $gio_giang_hop = Hop::sum('giogiang');
        $gio_khoahoc_hop = Hop::sum('giokhoahoc');
        // HDKH 
        $gio_giang_hdkh = Hdkh::sum('gio_giang');
        $gio_khoahoc_hdkh = Hdkh::sum('gio_khoahoc');
        // Chấm Bài 
        $gio_giang_cham = ChamBai::sum('gio_giang');
        $gio_khoahoc_cham = ChamBai::sum('gio_khoahoc');
        // ĐI thực tế 
        $gio_giang_ct = CongTac::sum('gio_giang');
        $gio_khoahoc_ct = CongTac::sum('gio_khoahoc');
        // Dạy Giỏi 
        $gio_giang_day = DayGioi::sum('gio_giang');
        $gio_khoahoc_day = DayGioi::sum('gio_khoahoc');
        $gio_giang = $gio_giang_hop + $gio_giang_hdkh + $gio_giang_cham + $gio_giang_ct + $gio_giang_day;
        $gio_khoa_hoc = $gio_khoahoc_hop + $gio_khoahoc_hdkh + $gio_khoahoc_cham + $gio_khoahoc_ct + $gio_khoahoc_day;
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
            'gio_giang' => $gio_giang,
            'gio_khoa_hoc' => $gio_khoa_hoc
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
