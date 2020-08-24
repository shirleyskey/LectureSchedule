<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;

use App\HocTap;

use Carbon\Carbon;
class HocTapController extends Controller
{

    public function index()
    {
        return view('hoctap.browser.index', ['ds_hoctap' => HocTap::all()]);
    }

    public function create(){
        return view('hoctap.add.index', [
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

        $hoctap = new HocTap;
        $hoctap->id_giangvien = $request->id_giangvien;
        $hoctap->ten = $request->ten;
        $hoctap->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $hoctap->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $hoctap->thoigian = null;
        }
        try{
            $hoctap->save();
            return redirect()->route('hoctap.index')->with('status_success', 'Tạo mới Tham Gia Học Tập thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hoctap.index')->with('status_error', 'Xảy ra lỗi khi thêm Học Tập!');
        }
    }

    public function edit($id){
        return view('hoctap.edit.index', [
            'hoctap' => HocTap::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $hoctap = HocTap::savehoctap($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$hoctap->id.'-'.$hoctap->ten);
            return redirect()->route('hoctap.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hoctap.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $hoctap = HocTap::findOrFail($id);
        $name = $hoctap->ten;
        try{
            $hoctap->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('hoctap.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hoctap.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
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
    public function postThemHocTap(Request $request)
	{
		if ($request->ajax()) {
            try{
                $hoctap = HocTap::saveHocTap(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$hoctap->id.'-'.$hoctap->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimHocTapTheoId(Request $request){
        $hoctap = HocTap::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $hoctap
            ]);
        
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaHocTap(Request $request)
	{
		if ($request->ajax()) {
           
            try{
                $hoctap = HocTap::saveHocTap($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$hoctap->id.'-'.$hoctap->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaHocTap(Request $request){
        $hoctap = HocTap::findOrFail($request->input('id'));
        $id = $hoctap->id;
        try{
            $hoctap->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$hoctap->ten);
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
