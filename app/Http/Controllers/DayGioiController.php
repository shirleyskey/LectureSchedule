<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\DayGioi;
use Carbon\Carbon;
class DayGioiController extends Controller
{

    public function index()
    {
        return view('daygioi.browser.index', ['ds_daygioi' => DayGioi::all()]);
    }

    public function create(){
        return view('daygioi.add.index', [
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

        $daygioi = new DayGioi;
        $daygioi->id_giangvien = $request->id_giangvien;
        $daygioi->ten = $request->ten;
        $daygioi->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $daygioi->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $daygioi->thoigian = null;
        }
        try{
            $daygioi->save();
            return redirect()->route('daygioi.index')->with('status_success', 'Tạo mới Dạy Giỏi thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('daygioi.index')->with('status_error', 'Xảy ra lỗi khi thêm Dạy Giỏi!');
        }
    }

    public function edit($id){
        return view('daygioi.edit.index', [
            'daygioi' => DayGioi::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $daygioi = DayGioi::saveDayGioi($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$daygioi->id.'-'.$daygioi->ten);
            return redirect()->route('daygioi.index')->with('status_success', 'Chỉnh sửa Thông tin Dạy Giỏi thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('daygioi.index')->with('status_error', 'Xảy ra lỗi khi sửa Dạy Giỏi!');
        }
        
    }

    public function destroy($id){
        $daygioi = DayGioi::findOrFail($id);
        $name = $daygioi->ten;
        try{
            $daygioi->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$id.'-'.$name);
            return redirect()->route('daygioi.index')->with('status_success', 'Xóa Dạy Giỏi thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('daygioi.index')->with('status_error', 'Xảy ra lỗi khi xóa Dạy Giỏi!');
        }
    }

    //AJAX
    public function postThemDayGioi(Request $request)
	{
		if ($request->ajax()) {
            try{
                $daygioi = DayGioi::saveDayGioi(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$daygioi->id.'-'.$daygioi->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimDayGioiTheoId(Request $request){
        $daygioi = DayGioi::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $daygioi
            ]);
        
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaDayGioi(Request $request)
	{
		if ($request->ajax()) {
           
            try{
                $daygioi = DayGioi::saveDayGioi($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$daygioi->id.'-'.$daygioi->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaDayGioi(Request $request){
        $daygioi = DayGioi::findOrFail($request->input('id'));
        $id = $daygioi->id;
        try{
            $daygioi->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Dạy Giỏi id:'.$request->input('id').'-'.$daygioi->ten);
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
