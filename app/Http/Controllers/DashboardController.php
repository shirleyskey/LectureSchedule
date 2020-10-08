<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangVien;
use App\ChamBai;
use App\CongTac;
use App\Dang;
use App\DayGioi;
use App\DotXuat;
use App\HocTap;
use App\Nckh;
use App\SangKien;
use App\XayDung;
use App\HocPhan;
use App\Lop;
class DashboardController extends Controller
{
    //
    public function getDashboard(){
        $giangvien = GiangVien::all();
        $hocphan = HocPhan::all();
        $congtac = CongTac::all();
        $dang = Dang::all();
        $chambai = ChamBai::all();
        $daygioi = DayGioi::all();
        $dotxuat = DotXuat::all();
        $hoctap = HocTap::all();
        $lop = Lop::all();
        $nckh = Nckh::all();
        $sangkien = SangKien::all();
        $xaydung = XayDung::all();
        return view('dashboard.index', [
            'giangvien' => $giangvien,
            'hocphan' => $hocphan,
            'congtac' => $congtac,
            'dang' => $dang,
            'daygioi' => $daygioi,
            'dotxuat' => $dotxuat,
            'hoctap' => $hoctap,
            'lop' => $lop,
            'nckh' => $nckh,
            'sangkien' => $sangkien,
            'xaydung' => $xaydung,
            'chambai' => $chambai,
        ]);
    }

    public function readDashboard(){
        $giangvien = GiangVien::all();
        $hocphan = HocPhan::all();
        $congtac = CongTac::all();
        $dang = Dang::all();
        $chambai = ChamBai::all();
        $daygioi = DayGioi::all();
        $dotxuat = DotXuat::all();
        $hoctap = HocTap::all();
        $lop = Lop::all();
        $nckh = Nckh::all();
        $sangkien = SangKien::all();
        $xaydung = XayDung::all();
        return view('dashboard.read', [
            'giangvien' => $giangvien,
            'hocphan' => $hocphan,
            'congtac' => $congtac,
            'dang' => $dang,
            'daygioi' => $daygioi,
            'dotxuat' => $dotxuat,
            'hoctap' => $hoctap,
            'lop' => $lop,
            'nckh' => $nckh,
            'sangkien' => $sangkien,
            'xaydung' => $xaydung,
            'chambai' => $chambai,
        ]);
    }
}
