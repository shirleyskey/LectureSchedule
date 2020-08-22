<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\GiangVien;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::with('roles')->get();

        return view('user.browser', ['users' => $users]);
    }

    public function create(){
        $roles = Role::all();
        return view('user.add', [
        'giangvien' => GiangVien::all(),
        ])->withRoles($roles);
    }

    public function store(Request $request){
        
        $request->validate([
            'name'     => 'required',
            'id_giangvien'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|max:32'
        ],[
            'name.required'     => 'Bạn chưa nhập "Họ tên"',
            'id_giangvien.required'     => 'Bạn chưa chọn "Giảng Viên"',
            'email.required'    => 'Bạn chưa nhập "Email"',
            'email.email'       => '"Email" không đúng định dạng',
            'email.unique'      => '"Email" người dùng đã tồn tại',
            'password.required' => 'Bạn chưa nhập "Mật khẩu"',
            'password.min'      => '"Mật khẩu" phải ít nhất 6 ký tự',
            'password.max'      => '"Mật khẩu" không quá 32 ký tự'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->id_giangvien = $request->id_giangvien;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->role = $request->role;
        
        try{
            $user->save();
            $user->syncRoles($request->role);
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm người dùng ID:'.$user->id);
            return redirect()->route('user.index')->with('status_success', 'Tạo mới người dùng thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('user.index')->with('status_error', 'Xảy ra lỗi khi thêm người dùng!');
        }
    }

    public function edit($id){
        $user = User::where('id', $id)->with('roles')->first();
        $roles = Role::all();
        return view('user.edit', [
            'giangvien' => GiangVien::all(),
        ])->withUser($user)->withRoles($roles);
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$request->id,
            'password' => 'max:32' 
        ],[
            'name.required'    => 'Bạn chưa nhập "Họ tên"',
            'email.required'   => 'Bạn chưa nhập "Email"',
            'email.email'      => '"Email" không đúng định dạng',
            'email.unique'     => '"Email" người dùng đã tồn tại',
            'password.max'     => '"Mật khẩu" không quá 32 ký tự'
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->chucvu = $request->chucvu;
        $user->hesoluong = $request->hesoluong;
        $user->diachi = $request->diachi;
        $user->chucdanh = $request->chucdanh;
        $user->trinhdo = $request->trinhdo;
        $user->cothegiang = $request->cothegiang;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->active = $request->active;

        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '_user'.$user->id.'_avatar.'. $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user->avatar = $filename;
    	}

        try{
            $user->save();
            $user->syncRoles($request->role);
            Log::info('Người dùng ID:'.Auth::user()->id.' đã chỉnh sửa người dùng id:'.$user->id);
            return redirect()->route('user.index')->with('status_success', 'Chỉnh sửa người dùng thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('user.index')->with('status_error', 'Xảy ra lỗi khi chỉnh sửa người dùng!');
        }
    }

    public function destroy($id){

        $user = User::findOrFail($id);

        if($user->id == Auth::user()->id){
            return redirect()->route('user.index')->with('status_danger', 'Bạn không được xóa tài khoản của mình!');
        }else{
            try{
                $user->delete();
                Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa người dùng id:'.$id);
                return redirect()->route('user.index')->with('status_success', 'Xóa người dùng thành công!');
            }
            catch(\Exception $e){
                Log::error($e);
                return redirect()->route('user.index')->with('status_error', 'Xảy ra lỗi khi xóa người dùng!');
            }
            
        }
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import() 
    {
        $import = Excel::import(new UsersImport, request()->file('user_file'));
        return redirect()->back()->with('success', 'Success!!!');
    }

   
    
}
