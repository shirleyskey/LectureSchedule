<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\SangKien;
use Carbon\Carbon;
class sangkienController extends Controller
{

    public function index()
    {
        return view('sangkien.browser.index', ['ds_sangkien' => SangKien::all()]);
    }

    public function create(){
        return view('sangkien.add.index', [
            'ds_giangvien' => GiangVien::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'id_giangvien'     => 'required',
            'ten'    => 'required',
            
        ],[
            'id_giangvien.required'     => 'Bạn chưa chọn "Giảng Viên"',
            'ten.required'    => 'Bạn chưa nhập "Tên công tác"',
        ]);

        $sangkien = new SangKien;
        $sangkien->id_giangvien = $request->id_giangvien;
        $sangkien->ten = $request->ten;
        $sangkien->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $sangkien->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $sangkien->thoigian = null;
        }
        try{
            $sangkien->save();
            return redirect()->route('sangkien.index')->with('status_success', 'Tạo mới Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('sangkien.index')->with('status_error', 'Xảy ra lỗi khi thêm Công Tác!');
        }
    }

    public function edit($id){
        return view('sangkien.edit.index', [
            'sangkien' => SangKien::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $sangkien = SangKien::saveSangKien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$sangkien->id.'-'.$sangkien->ten);
            return redirect()->route('sangkien.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('sangkien.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $sangkien = SangKien::findOrFail($id);
        $name = $sangkien->ten;
        try{
            $sangkien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('sangkien.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('sangkien.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
        }
    }

    public function importExcel(){
        return view('giangvien.import.index');
    }

    public function postImportExcel(Request $request){
        
    }

    public function exportExcel(){
        
    }

       
    //AJAX
    public function postThemSangKien(Request $request)
	{
		if ($request->ajax()) {
            try{
                $sangkien = SangKien::saveSangKien(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$sangkien->id.'-'.$sangkien->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimSangKienTheoId(Request $request){
        $sangkien = SangKien::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $sangkien
            ]);
        
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaSangKien(Request $request)
	{
		if ($request->ajax()) {
           
            try{
                $sangkien = SangKien::saveSangKien($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$sangkien->id.'-'.$sangkien->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaSangKien(Request $request){
        $sangkien = SangKien::findOrFail($request->input('id'));
        $id = $sangkien->id;
        try{
            $sangkien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$sangkien->ten);
            return response()->json([
                'status' => true
            ]);
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => false,
                'data' => 'Xảy ra lỗi trong quá trình xóa!'
            ]);
        }
    }
    // END AJAX
}
