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

class ProfileController extends Controller
{
    //
    public function edit($id){
        return view('user.edit.index', [
            'giangvien' => GiangVien::findOrFail($id), 
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'dotxuat' => DotXuat::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'nckh' => Nckh::where('id_giangvien', $id)->get(),
            'sangkien' => SangKien::where('id_giangvien', $id)->get(),
            'xaydung' => XayDung::where('id_giangvien', $id)->get(),
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
