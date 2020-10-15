<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\GiangVien;
use App\ChamBai;
use App\CongTac;
use App\Dang;
use App\DayGioi;
use App\HocTap;
use App\Hdkh;
use App\VanBan;
use App\Hop;
use App\HocPhan;
use App\Nckh;
use App\XayDung;
use App\Lop;
use App\User;
use App\Role;

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
        
        return view('user.edit.index', [
            'giangvien' => $giangvien,
            'nckh' => $nckh,
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'xaydung' => XayDung::where('id_giangvien', $id)->get(),
            'hdkh' => Hdkh::where('id_giangvien', $id)->get(),
            'hop' => Hop::where('id_giangvien', $id)->get(),
            'vanban' => VanBan::where('id_giangvien', $id)->get(),
            'hocphan' => HocPhan::all(),
            'lop' => Lop::all(),
            'taikhoan' => Auth::user(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            //Sửa User 
            $user = User::findOrFail($request->id_user);
            $user->email = $request->email;
            if(!empty($request->password)){
            $user->password = Hash::make($request->password);
                }
            $user->save();

            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('profile.edit.get', Auth::user()->id)->with('status_success', 'Chỉnh sửa Thông Tin thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('profile.edit.get', Auth::user()->id)->with('status_error', 'Xảy ra lỗi khi sửa Thông Tin!');
        }

    }

    public function taikhoan(){
        $user = Auth::user();
        return view('user.edit', [
            'user' => $user,
        ] );
    }
}
