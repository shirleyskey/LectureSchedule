<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Lop;
use App\GiangVien;
use App\HocPhan;
class LopController extends Controller
{
    //
    public function index()
    {
        return view('lop.browser.index', ['ds_lop' => Lop::all()]);
    }

    public function read($id)
    {
        $lop = Lop::findOrFail($id);
        return view('lop.read.index', [
            'lop' => $lop,
            'hocphan' => HocPhan::where('id_lop', $id)->get(),
        ]);
    }

    public function create(){
        return view('lop.add.index', [
        ]);
    }

    public function store(Request $request){
        $lop = new Lop;
        $lop->tenlop = $request->tenlop;
        $lop->quymo = $request->quymo;
        $lop->malop = $request->malop;
        $lop->he = $request->he;
        try{
            $lop->save();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Lớp ID:'.$lop->id.'-'.$lop->tenlop);
            return redirect()->route('lop.index')->with('status_success', 'Tạo mới Lớp thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('lop.index')->with('status_error', 'Xảy ra lỗi khi thêm Lớp!');
        }
    }

    public function edit($id){
        return view('lop.edit.index', [
            'lop' => Lop::findOrFail($id),
            'hocphan' => HocPhan::where('id_lop', $id)->get(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $lop = Lop::saveLop($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Lớp ID:'.$lop->id.'-'.$lop->ten);
            return redirect()->route('lop.edit.get', $id)->with('status_success', 'Chỉnh sửa Lớp thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('lop.edit.get', $id)->with('status_error', 'Xảy ra lỗi khi sửa Lớp!');
        }

    }

    public function destroy($id){
        $lop = Lop::findOrFail($id);
        $ten = $lop->tenlop;
        try{
            // $lop->hocphans()->delete();
            // Bắt Đầu 
            $hocphans = HocPhan::where('id_lop', $id)->get();
            foreach($hocphans as $hocphan){
                $mahocphan = $hocphan->id;
                $hocphanxoa = HocPhan::findOrFail($mahocphan);
                $hocphanxoa->tiets()->delete();
                $hocphanxoa->bais()->delete();
                $hocphanxoa->delete();
            }
            // Kết Thúc 
            $lop->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Lớp id:'.$id.'-'.$ten);
            return redirect()->route('lop.index')->with('status_success', 'Xóa Lớp thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('lop.index')->with('status_error', 'Xảy ra lỗi khi xóa Lớp!');
        }
    }

}
