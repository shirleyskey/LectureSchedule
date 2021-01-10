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
        return view('lichgiang.phancong', [
            'lop' => $lop,
            'ds_hocphan' => $ds_hocphan,
            
        ]);
    }
   
}

