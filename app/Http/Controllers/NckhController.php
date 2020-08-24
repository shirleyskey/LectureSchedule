<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\GiangVien;
use App\Nckh;

class NckhController extends Controller
{

    public function index()
    {
        return view('nckh.browser.index', ['ds_nckh' => Nckh::all()]);
    }

    public function create(){
        return view('nckh.add.index', [
            'giangvien' => GiangVien::all(),
            // 'ds_ho_so' => HoSo::all()
        ]);
    }

    public function store(Request $request){
        
        try{
            $nckh = Nckh::saveNckh(0, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm NCKH ID:'.$nckh->id.'-'.$nckh->ten);
            return redirect()->route('nckh.index')->with('status_success', 'Tạo mới NCKH thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nckh.index')->with('status_error', 'Xảy ra lỗi khi thêm Nghiên Cứu Khoa Học!');
        }
    }

    public function edit($id){
        return view('nckh.edit.index', [
            'nckh'=> Nckh::findOrFail($id), 
            'giangvien' => GiangVien::all(),
        ]);
    }

    public function update(Request $request, $id){
        try{
            $nckh = Nckh::saveNckh($id, $request->all());
            Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa NckhID:'.$nckh->id.'-'.$nckh->ten);
            return redirect()->route('nckh.index')->with('status_success', 'Chỉnh sửa Nckh thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nckh.index')->with('status_error', 'Xảy ra lỗi khi sửa NCKH!');
        }
        
    }

    public function destroy($id){
        $nckh = Nckh::findOrFail($id);
        $name = $nckh->ten;
        try{
            $nckh->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa Nghiên Cứu Khoa Học id:'.$id.'-'.$name);
            return redirect()->route('nckh.index')->with('status_success', 'Xóa Nghiên Cứu KH thành công!');
        }
        catch(\Exception $e){
            Log::error($e);
            return redirect()->route('nckh.index')->with('status_error', 'Xảy ra lỗi khi xóa NCKH!');
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
    public function postThemNckh(Request $request)
	{
		if ($request->ajax()) {
            try{
                $nckh = Nckh::saveNckh(0, $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã thêm Nckh ID:'.$nckh->id.'-'.$nckh->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postTimNckhTheoId(Request $request){
        $nckh = Nckh::findOrFail($request->input('id'));
            return response()->json([
                'status' => true,
                'data'   => $nckh
            ]);
        
        return response()->json([
            'status' => false
        ]); 
    }

    public function postSuaNckh(Request $request)
	{
		if ($request->ajax()) {
           
            try{
                $nckh = Nckh::saveNckh($request->input('id'), $request->all());
                Log::info('Người dùng ID:'.Auth::user()->id.' đã sửa Nckh ID:'.$nckh->id.'-'.$nckh->ten);
                return response()->json([
                    'status' => true
                ]);
            }
            catch(\Exception $e){
                Log::error($e);
            }
		}
    }

    public function postXoaNckh(Request $request){
        $nckh = Nckh::findOrFail($request->input('id'));
        $id = $nckh->id;
        try{
            $nckh->delete();
            Log::info('Người dùng ID:'.Auth::user()->id.' đã xóa NCKH id:'.$request->input('id').'-'.$nckh->ten);
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
