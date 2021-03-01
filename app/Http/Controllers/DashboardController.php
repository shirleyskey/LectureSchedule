<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangVien;
use App\ChamBai;
use App\CongTac;
use App\Dang;
use App\DayGioi;
use App\HocTap;
use App\Nckh;
use App\XayDung;
use App\HocPhan;
use App\Lop;
use App\VanBan;
use App\Hop;
use App\Hdkh;
use Carbon\Carbon;
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
        $hoctap = HocTap::all();
        $lop = Lop::all();
        $nckh = Nckh::all();
        $xaydung = XayDung::all();
        $hdkh = Hdkh::all();
        $hop = Hop::all();
        
        $vanban = VanBan::whereBetween("thoigian_den",array(Carbon::now(),Carbon::now()->addDays(1)))->get();
        return view('dashboard.index', [
            'giangvien' => $giangvien,
            'hocphan' => $hocphan,
            'congtac' => $congtac,
            'dang' => $dang,
            'daygioi' => $daygioi,
            'hoctap' => $hoctap,
            'lop' => $lop,
            'nckh' => $nckh,
            'xaydung' => $xaydung,
            'chambai' => $chambai,
            'hop' => $hop,
            'hdkh' => $hdkh,
            'vanban' => $vanban,

        ]);
    }

    public function deadline(){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $vanban = VanBan::where("hoan_thanh", NULL)->where('thoigian_den','<',$now )->get();
        $chambai = ChamBai::where("hoan_thanh", NULL)->where('ket_thuc','<',$now )->get();
        $dang = Dang::where("hoan_thanh", NULL)->where('ket_thuc','<',$now )->get();
        $daygioi = DayGioi::where("hoan_thanh", NULL)->where('ket_thuc','<',$now )->get();
        $congtac= CongTac::where("hoan_thanh", NULL)->where('ket_thuc','<',$now )->get();
        $hdkh= Hdkh::where("hoan_thanh", NULL)->where('ket_thuc','<',$now )->get();
        $nckh= Nckh::where("hoan_thanh", NULL)->where('ketthuc','<',$now )->get();
        return view('dashboard.deadline', [
            'vanban' => $vanban,
            'chambai' => $chambai,
            'dang' => $dang,
            'daygioi' => $daygioi,
            'congtac' => $congtac,
            'hdkh' => $hdkh,
            'nckh' => $nckh,

        ]);
    }

    public function readDashboard(){
        $giangvien = GiangVien::all();
        $hocphan = HocPhan::all();
        $congtac = CongTac::all();
        $dang = Dang::all();
        $chambai = ChamBai::all();
        $daygioi = DayGioi::all();
        $hoctap = HocTap::all();
        $lop = Lop::all();
        $nckh = Nckh::all();
        $xaydung = XayDung::all();
        return view('dashboard.read', [
            'giangvien' => $giangvien,
            'hocphan' => $hocphan,
            'congtac' => $congtac,
            'dang' => $dang,
            'daygioi' => $daygioi,
            'hoctap' => $hoctap,
            'lop' => $lop,
            'nckh' => $nckh,
            'xaydung' => $xaydung,
            'chambai' => $chambai,
        ]);
    }
}
