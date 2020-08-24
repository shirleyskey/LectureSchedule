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

class GiangVienController extends Controller
{

    public function index()
    {
        return view('giangvien.browser.index', ['ds_giangvien' => GiangVien::all()]);
    }

    public function read($id)
    {
        $giangvien = GiangVien::findOrFail($id);
        return view('giangvien.read.index', [
            'giangvien' => $giangvien,
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'dotxuat' => DotXuat::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'nckh' => Nckh::where('id_giangvien', $id)->get(),
            'sangkien' => SangKien::where('id_giangvien', $id)->get(),
            'xaydung' => XayDung::where('id_giangvien', $id)->get(),
        ]);
    }

    public function create(){
        return view('giangvien.add.index', [
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'ten'        => 'required',
            'cothegiang'        => 'required'
        ],[
            'ten.required' => '"Tên Giảng Viên" Phải nhập',
            'cothegiang.required' => '"Có thể giảng" phải nhập'
        ]);
        $giangvien = new GiangVien;
        $giangvien->ten = $request->ten;
        $giangvien->chucvu = $request->chucvu;
        $giangvien->hesoluong = $request->hesoluong;
        $giangvien->diachi = $request->diachi;
        $giangvien->chucdanh = $request->chucdanh;
        $giangvien->trinhdo = $request->trinhdo;
        $giangvien->cothegiang = $request->cothegiang;
        
        try{
            $giangvien->save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.index')->with('status_success', 'Tạo mới giảng viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi thêm giảng viên!');
        }
    }

    public function edit($id){
        return view('giangvien.edit.index', [
            'giangvien' => GiangVien::findOrFail($id), 
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'dotxuat' => DotXuat::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'nckh' => Nckh::where('id_giangvien', $id)->get(),
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

    public function destroy($id){
        $giangvien = GiangVien::findOrFail($id);
        $name = $giangvien->ten;
        try{
            $giangvien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa nhân sự id:'.$id.'-'.$name);
            return redirect()->route('giangvien.index')->with('status_success', 'Xóa Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi xóa Giảng Viên!');
        }
    }

    public function importExcel(){
        return view('giangvien.import.index');
    }

    public function postImportExcel(Request $request){
      
    }

    public function exportExcel(){
      
    }
}
