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
       
        
        return view('user.edit.index', [
            'giangvien' => $giangvien,
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
