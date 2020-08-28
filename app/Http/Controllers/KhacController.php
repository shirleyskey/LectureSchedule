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
use App\DotXuat;
use App\HocTap;
use App\Nckh;
use App\SangKien;
use App\XayDung;
use App\KhoaLuan;
use App\LuanVan;
use App\LuanAn;
use App\Ncs;
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
            'sangkien' => SangKien::all(),
            'khoaluan' => KhoaLuan::all(),
            'luanvan' => LuanVan::all(),
            'luanan' => LuanAn::all(),
            'ncs' => Ncs::all(),
            'xaydung' => XayDung::all(),
            'dotxuat' => DotXuat::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.index')->with('status_success', 'Chỉnh sửa Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi sửa Giảng viên!');
        }
        
    }
}
