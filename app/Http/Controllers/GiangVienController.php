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
use App\HocTap;
use App\Nckh;
use App\XayDung;
use App\HocPhan;
use App\Hop;
use App\Lop;
use App\Hdkh;
use App\VanBan;
use App\Exports\GiangViensExport;
use App\Imports\GiangViensImport;
use Maatwebsite\Excel\Facades\Excel;


class GiangVienController extends Controller
{

    public function index()
    {
        return view('giangvien.browser.index', ['ds_giangvien' => GiangVien::all()]);
    }

    public function read($id)
    {
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
        //Lấy Danh Sách Van Bản
        $ds_vanbans = VanBan::all();
        $vanban = array();
        foreach($ds_vanbans as $ds_vanban){
            $chu_tri = json_decode($ds_vanban->chu_tri, true);
            $tham_gia = json_decode($ds_vanban->tham_gia, true);
            if((in_array($id, $chu_tri)) || (in_array($id, $tham_gia))){
                array_push($vanban, $ds_vanban);
            };
        };

        return view('giangvien.read.index', [
            'giangvien' => $giangvien,
            'chambai' => ChamBai::where('id_giangvien', $id)->get(),
            'congtac' => CongTac::where('id_giangvien', $id)->get(),
            'dang' => Dang::where('id_giangvien', $id)->get(),
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'hop' => Hop::where('id_giangvien', $id)->get(),
            'daygioi' => DayGioi::where('id_giangvien', $id)->get(),
            'nckh' => $nckh,
            'vanban' => $vanban,
            'xaydung' => XayDung::where('id_giangvien', $id)->get(),
            'hdkh' => Hdkh::where('id_giangvien', $id)->get(),
            'hocphan' => HocPhan::all(),
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
        $giangvien->ma_giangvien = $request->ma_giangvien;
        $giangvien->bai_giang = $request->bai_giang;
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
            'hoctap' => HocTap::where('id_giangvien', $id)->get(),
            'xaydung' => XayDung::where('id_giangvien', $id)->get(),
            'hdkh' => Hdkh::where('id_giangvien', $id)->get(),
            'hop' => Hop::where('id_giangvien', $id)->get(),
            'vanban' => VanBan::where('id_giangvien', $id)->get(),
            'lop' => Lop::all(),
            'hocphan' => HocPhan::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.edit.get',$id)->with('status_success', 'Chỉnh sửa Giảng Viên thành công!');
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
             // Xóa user tham chiếu đến giảng viên đó 
            $giangvien->user()->delete();
            //Xóa họp liên quan đến giảng viên 
            $giangvien->hops()->delete();
            // tiet
            $giangvien->tiets()->delete();
            //Xay Dung 
            $giangvien->xaydungs()->delete();
            //Dang
            $giangvien->dangs()->delete();
            //HocTap
            $giangvien->hoctaps()->delete();
            //Congtac
            $giangvien->congtacs()->delete();
            // Chambai 
            $giangvien->chambais()->delete();
            $giangvien->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa nhân sự id:'.$id.'-'.$name);
            return redirect()->route('giangvien.index')->with('status_success', 'Xóa Giảng Viên thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi xóa Giảng Viên!');
        }
    }

    public function import(Request $request)
    {
        try{
            Excel::import(new GiangViensImport, $request->file('giangvien-file'));
            return redirect()->route('giangvien.index')->with('success', 'All good!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi nhập file Excel!');
        }
    }

    public function export()
    {
        try{
            return Excel::download(new GiangViensExport, 'giangviens.xlsx');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi xuất file Excel!');
        }


    }

}
