<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\GiangVien;
use App\HocPhan;
use App\Lop;
use App\Bai;
use App\Tiet;
use Calendar;
class LichGiangController extends Controller
{
    //
    public function phancong(){
        
        $lop = Lop::all();
        $ds_hocphan = HocPhan::all();
        $so_tiet = Tiet::sum('so_tiet');
        // dd($so_tiet);
        $tiets = Tiet::all();
        $so_gio = 0;
        $so_gio_tien = 0;
        $tong_gio = 0;
        foreach($tiets as $tiet){
            $he = $tiet->lops->he;
            $quymo = $tiet->lops->quymo;
            if($he == 1){
                $so_gio = $so_gio + ($tiet->so_tiet * $quymo);
            }
            if($he == 0){
                $so_gio_tien = $so_gio_tien + ($tiet->so_tiet * $quymo);
            }

        }
        $tong_gio = $so_gio + $so_gio_tien;
        // dd($so_gio_tien);
        return view('lichgiang.phancong', [
            'lop' => $lop,
            'ds_hocphan' => $ds_hocphan,
            'so_tiet' => $so_tiet,
            'so_gio' => $so_gio,
            'so_gio_tien' => $so_gio_tien,
            'tong_gio' => $tong_gio,
            
        ]);
    }
   
}

