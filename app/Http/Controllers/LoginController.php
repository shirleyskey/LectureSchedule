<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Auth;

class LoginController extends Controller
{
    //Login
    public function getLogin(){
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login.index');
    }

    //Post Login
    public function postLogin(Request $request){
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6|max:32'

        ],[
            'email.required'   => 'Bạn chưa nhập "Email"',
            'email.email'      => 'Email chưa đúng định dạng',
            'password.required'=> 'Bạn chưa nhập "Mật Khẩu"',
            'password.min'     => '"Mật Khẩu" phải ít nhất 6 ký tự',
            'password.max'     => '"Mật Khẩu" không quá 32 ký tự'

        ]);
        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            Log::info('Email: '.$request->email.' đăng nhập thành công');
            return redirect()->route('dashboard');
        }else{
            Log::error('Email: '.$request->email.' đăng nhập thất bại');
            return redirect()->route('login')->with('status_error', 'Đăng nhập thất bại, vui lòng thử lại!');
        }
    }

    //Logout...
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
