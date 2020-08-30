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

class ProfileController extends Controller
{
    public function edit($id){
        $giangvien = GiangVien::findOrFail($id);
        //Lấy Danh Sách NCKH
        $ds_nckhs = Nckh::all();
        $nckh = array();
        foreach($ds_nckhs as $ds_nckh){
            $chubien = json_decode($ds_nckh->chubien, true);
            $thamgia = json_decode($ds_nckh->thamgia, true);
            if((in_array($id, $chubien)) || (in_array($id, $thamgia))){
                array_push($nckh, $ds_nckh);
            };
        };
        //Lấy Danh Sách Khóa Luận
        $ds_khoaluans = KhoaLuan::all();
        $khoaluan = array();
        foreach($ds_khoaluans as $ds_khoaluan){
            $huongdan = json_decode($ds_khoaluan->huongdan, true);
            $chutichcham = json_decode($ds_khoaluan->chutichcham, true);
            $thamgiacham = json_decode($ds_khoaluan->thamgiacham, true);
            if((in_array($id, $huongdan)) || (in_array($id, $chutichcham)) || (in_array($id, $thamgiacham))){
                array_push($khoaluan, $ds_khoaluan);
            };
        };
         //Lấy Danh Sách Luận Văn
         $ds_luanvans = LuanVan::all();
         $luanvan = array();
         foreach($ds_luanvans as $ds_luanvan){
             $huongdan = json_decode($ds_luanvan->huongdan, true);
             $chutich = json_decode($ds_luanvan->chutich, true);
             $phanbien = json_decode($ds_luanvan->phanbien, true);
             $thuky = json_decode($ds_luanvan->thuky, true);
             $uyvien = json_decode($ds_luanvan->uyvien, true);
             if((in_array($id, $huongdan)) || (in_array($id, $chutich)) || (in_array($id, $phanbien)) || (in_array($id, $thuky)) || (in_array($id, $uyvien))){
                 array_push($luanvan, $ds_luanvan);
             };
         };

          //Lấy Danh Sách Luận Án
          $ds_luanans = LuanAn::all();
          $luanan = array();
          foreach($ds_luanans as $ds_luanan){
              $docnhanxet = json_decode($ds_luanan->chutich, true);
              $chutichhoithao = json_decode($ds_luanan->chutichhoithao, true);
              $thanhvienhoithao = json_decode($ds_luanan->thanhvienhoithao, true);
              $chutich = json_decode($ds_luanan->chutich, true);
              $thanhvien = json_decode($ds_luanan->thanhvien, true);
              if(($ds_luanan->huongdanchinh == $id) || ($ds_luanan->huongdanphu == $id) || (in_array($id, $docnhanxet)) || (in_array($id, $chutichhoithao)) || (in_array($id, $thanhvienhoithao)) || (in_array($id, $chutich)) || (in_array($id, $thanhvien))){
                  array_push($luanan, $ds_luanan);
              };
          };
            //Lấy Danh Sách Nghiên cứu sinh
        $ds_ncss = Ncs::all();
        $ncs = array();
        foreach($ds_ncss as $ds_ncs){
            $thanhvien = json_decode($ds_ncs->thanhvien, true);
            $thuky = json_decode($ds_ncs->thuky, true);
            if((in_array($id, $thanhvien)) || (in_array($id, $thuky))){
                array_push($ncs, $ds_ncs);
            };
        };
        return view('user.edit.index', [
            'giangvien' => $giangvien,
            'nckh' => $nckh,
            'khoaluan' => $khoaluan,
            'luanvan' => $luanvan,
            'luanan' => $luanan,
            'ncs' => $ncs,
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'dotxuat' => DotXuat::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
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
