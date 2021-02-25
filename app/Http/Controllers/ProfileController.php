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
       
        if(Auth::user()->id_giangvien == $id){
        return view('user.edit.index', [
            'giangvien' => $giangvien,
            'taikhoan' => Auth::user(),
        ]);
        }
        else abort(403, 'Unauthorized action.');
    }

    public function update_user(Request $request){
        $request->validate([
            'email'   => 'required|email',
        ],[
            'email.required'   => 'Bạn chưa nhập "Email"',
            'email.email'      => 'Email chưa đúng định dạng',
        ]);
        $request->validate([
            'password' => 'required|min:6|max:32'
        ],[
            'password.min'     => '"Mật Khẩu" phải ít nhất 6 ký tự',
            'password.max'     => '"Mật Khẩu" không quá 32 ký tự'
            ]);
            
        
        try{
            $password =  $request->password;
            $user = User::findOrFail($request->id);
            
            if(Hash::check($password, $user->password) == true){
                $user->email = $request->email;
                if(!empty($request->password_new)){
                $user->password = Hash::make($request->password_new);
                    }
                $user->save();
                return redirect()->route('profile.edit.get', Auth::user()->id_giangvien)->with('status_success', 'Chỉnh sửa Thông Tin tài khoản thành công! ');
            }
            else{
                return redirect()->route('profile.edit.get', Auth::user()->id_giangvien)->with('status_error', 'Mật khẩu cũ không chính xác!');
            }
            }
            
            catch(\Exception $e){
                Log::error($e);
                return redirect()->route('profile.edit.get', Auth::user()->id_giangvien)->with('status_error', 'Xảy ra lỗi khi sửa Thông Tin!');
            }
        }
       

    

    public function update(Request $request){
        try{
            if(Auth::user()->id_giangvien == $request->id){
                $giangvien = GiangVien::findOrFail($request->id);
                $giangvien->ten = $request->ten;
                $giangvien->congviec = $request->congviec;
                $giangvien->capbac = $request->capbac;
                $giangvien->diachi = $request->diachi;
                $giangvien->ma_giangvien = $request->ma_giangvien;
                $giangvien->bai_giang = $request->bai_giang;
                $giangvien->chucdanh = $request->chucdanh;
                $giangvien->trinhdo = $request->trinhdo;
                $giangvien->cothegiang = $request->cothegiang;
                $giangvien->save();
            }
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('profile.edit.get', $giangvien->id)->with('status_success', 'Chỉnh sửa Thông Tin Giảng Viên thành công!');
            
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('profile.edit.get', Auth::user()->id_giangvien)->with('status_error', 'Xảy ra lỗi khi sửa Thông Tin!');
        }

    }

    public function taikhoan(){
        $user = Auth::user();
        return view('user.edit', [
            'user' => $user,
        ] );
    }
}
