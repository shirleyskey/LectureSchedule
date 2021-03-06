<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LichHocPhanImport;
use Carbon\Carbon;
use App\HocPhan;
use App\Lop;
use App\Bai;
use App\GiangVien;
use App\Tiet;

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
            'tiet' => Tiet::where('id_hocphan', $id)->get(),
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
        $hocphan->sotinchi = $request->sotinchi;
        $hocphan->tenhocphan = $request->tenhocphan;
        $hocphan->mahocphan = $request->mahocphan;
       
      
        
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
            'tiet' => Tiet::where('id_hocphan', $id)->get(),
            'ds_giangvien' => GiangVien::where('cothegiang', 1)->get(),
            'bai' => Bai::where('id_hocphan', $id)->get(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $hocphan = HocPhan::saveHocPhan($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Học Phần ID:'.$hocphan->id.'-'.$hocphan->tenhocphan);
            return redirect()->route('hocphan.edit.get', $id)->with('status_success', 'Chỉnh sửa Học Phần thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.edit.get', $id)->with('status_error', 'Xảy ra lỗi khi sửa Học Phần!');
        }
        
    }

    public function destroy($id){
        $hocphan = HocPhan::findOrFail($id);
        $name = $hocphan->tenhocphan;
        try{
            $hocphan->tiets()->delete();
            $hocphan->bais()->delete();
            $hocphan->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$id.'-'.$name);
            return redirect()->route('hocphan.index')->with('status_success', 'Xóa Học Phần thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('hocphan.index')->with('status_error', 'Xảy ra lỗi khi xóa Học Phần!');
        }
    }

    public function destroy_lop($id){
        $hocphan = HocPhan::findOrFail($id);
        $name = $hocphan->tenhocphan;
        try{
            $hocphan->tiets()->delete();
            $hocphan->bais()->delete();
            $hocphan->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Học Phần id:'.$id.'-'.$name);
            return redirect()->route('lop.edit.get', $hocphan->id_lop)->with('status_success', 'Xóa Học Phần thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('lop.edit.get', $hocphan->id_lop)->with('status_error', 'Xảy ra lỗi khi xóa Học Phần!');
        }
    }

    public function import(Request $request, $id)
{
        $lich_hoc = new LichHocPhanImport($id);
        Excel::import($lich_hoc, $request->lichhocphan);
        if($lich_hoc->isValidFile == false){
            return redirect()->route('hocphan.edit.get', $id)->with('status_success', 'Import Lịch Học Thành Công!');
        } else {
            return redirect()->route('hocphan.edit.get', $id)->with('status_error', 'Xảy ra lỗi trong quá trình Import, xem lại file excel của bạn!');
        }
        
    // Excel::import(new LopImport, $request->calendar);

}
     //AJAX
     public function postThemHocPhan(Request $request)
     {
         if ($request->ajax()) {
             try{
                 $hocphan = HocPhan::saveHocPhan(0, $request->all());
                 Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Học Phần ID:'.$hocphan->id.'-'.$hocphan->start);
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
             $hocphan->tiets()->delete();
             $hocphan->bais()->delete();
             $hocphan->chambais()->delete();
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
                 'data' => 'Xảy ra lỗi trong quá trình xóa Học Phần!'
             ]);
         }
     }
     // END AJAX
}
