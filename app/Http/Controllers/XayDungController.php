<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\XayDung;
use Carbon\Carbon;
class XayDungController extends Controller
{

    public function index()
    {
        return view('xaydung.browser.index', ['ds_xaydung' => XayDung::all()]);
    }

    public function create(){
        return view('xaydung.add.index', [
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

        $xaydung = new XayDung;
        $xaydung->id_giangvien = $request->id_giangvien;
        $xaydung->ten = $request->ten;
        $xaydung->ghichu = $request->ghichu;
        if($request->thoigian != null){
            $xaydung->thoigian = Carbon::parse($request->thoigian)->format('Y-m-d');
        }
        else {
            $xaydung->thoigian = null;
        }
        try{
            $xaydung->save();
            return redirect()->route('xaydung.index')->with('status_success', 'Tạo mới Xây Dựng thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('xaydung.index')->with('status_error', 'Xảy ra lỗi khi thêm Xây Dựng!');
        }
    }

    public function edit($id){
        return view('xaydung.edit.index', [
            'xaydung' => XayDung::findOrFail($id),
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $xaydung = XayDung::savexaydung($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Công tác:'.$xaydung->id.'-'.$xaydung->ten);
            return redirect()->route('xaydung.index')->with('status_success', 'Chỉnh sửa Thông tin Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('xaydung.index')->with('status_error', 'Xảy ra lỗi khi sửa Công Tác!');
        }
        
    }

    public function destroy($id){
        $xaydung = XayDung::findOrFail($id);
        $name = $xaydung->ten;
        try{
            $xaydung->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Công Tác id:'.$id.'-'.$name);
            return redirect()->route('xaydung.index')->with('status_success', 'Xóa Công Tác thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('xaydung.index')->with('status_error', 'Xảy ra lỗi khi xóa Công Tác!');
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
    public function postThemXayDung(Request $request)
	{
		if ($request->ajax()) {
            try{
                $xaydung = XayDung::saveXayDung(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Dạy Giỏi ID:'.$xaydung->id.'-'.$xaydung->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimXayDungTheoId(Request $request){
        $xaydung = XayDung::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $xaydung
            ]);
        
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaXayDung(Request $request)
	{
		if ($request->ajax()) {
           
            try{
                $xaydung = XayDung::saveXayDung($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Xây Dựng ID:'.$xaydung->id.'-'.$xaydung->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaXayDung(Request $request){
        $xaydung = XayDung::findOrFail($request->input('id'));
        $id = $xaydung->id;
        try{
            $xaydung->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Xây Dựng id:'.$request->input('id').'-'.$xaydung->ten);
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
