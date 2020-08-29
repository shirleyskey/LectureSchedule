<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\HocPhan;
use App\Lop;
use App\Bai;
use App\GiangVien;
use App\Event;

class HocPhanController extends Controller
{
    public function index()
    {
        return view('hocphan.browser.index', ['ds_hocphan' => HocPhan::all()]);
    }

    public function read($id)
    {
        $hocphan = HocPhan::findOrFail($id);
        return view('hocphan.read.index', [
            'hocphan' => $hocphan,
            'bai' => Bai::where('id_hocphan', $id)->get(),
            'tiet' => Event::where('id_hocphan', $id)->get(),
        ]);
    }

    public function create(){
        return view('hocphan.add.index', [
            'ds_lop' => Lop::all(),
            // 'ds_ho_so' => HoSo::all()
        ]);
    }

    public function store(Request $request){
        $hocphan = new HocPhan;
        $hocphan->id_lop = $request->id_lop;
        $hocphan->sotiet = $request->sotiet;
        $hocphan->sotinchi = $request->sotinchi;
        $hocphan->tenhocphan = $request->tenhocphan;
        $hocphan->mahocphan = $request->mahocphan;
        $hocphan->start = Carbon::parse($request->start)->format('Y-m-d');
        $hocphan->end = Carbon::parse($request->end)->format('Y-m-d');
      
        
        try{
            $hocphan->save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
            return redirect()->route('hocphan.index')->with('status_success', 'Tạo mới Học Phần Chuyên Môn thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.index')->with('status_error', 'Xảy ra lỗi khi thêm Học Phần Chuyên Môn!');
        }
    }

    public function edit($id){
        return view('hocphan.edit.index', [
            'hocphan' => HocPhan::findOrFail($id), 
            'ds_lop' => Lop::all(),
            'ds_giangvien' => GiangVien::where('cothegiang', 1)->get(),
            'bai' => Bai::where('id_hocphan', $id)->get(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $giangvien = GiangVien::saveGiangVien($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Giảng viên ID:'.$giangvien->id.'-'.$giangvien->ten);
            return redirect()->route('giangvien.index')->with('status_success', 'Chỉnh sửa Học Phần thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('giangvien.index')->with('status_error', 'Xảy ra lỗi khi sửa Học Phần!');
        }
        
    }

    public function destroy($id){
        $hocphan = HocPhan::findOrFail($id);
        $name = $hocphan->tenhocphan;
        try{
            $hocphan->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$id.'-'.$name);
            return redirect()->route('hocphan.index')->with('status_success', 'Xóa Học Phần thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.index')->with('status_error', 'Xảy ra lỗi khi xóa Học Phần!');
        }
    }
     //AJAX
     public function postThemHocPhan(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $hocphan = HocPhan::saveHocPhan(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postTimHocPhanTheoId(Request $request){
         $hocphan = HocPhan::findOrFail($request->input('id'));
             return response()->json([
                 'status' => true,
                 'data'   => $hocphan
             ]);
         
         return response()->json([
             'status' => false
         ]); 
     }
 
     public function postSuaHocPhan(Request $request)
     {
         if ($request->ajax()) {
            
             try{
                 $hocphan = HocPhan::saveHocPhan($request->input('id'), $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
                 return response()->json([
                     'status' => true
                 ]);
             }
             catch(\Exception $e){
                 Log::error($e);
             }
         }
     }
 
     public function postXoaHocPhan(Request $request){
         $hocphan = HocPhan::findOrFail($request->input('id'));
         $id = $hocphan->id;
         try{
             $hocphan->delete();
             Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$request->input('id').'-'.$hocphan->tenhocphan);
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
