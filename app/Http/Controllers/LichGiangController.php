<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\GiangVien;
use App\HocPhan;
use App\Lop;
use App\Bai;
use App\Tiet;
use App\Event;
use Calendar;
class LichGiangController extends Controller
{
    //
    public function phancong(){
        
        $lop = Lop::all();
        $hocphan = HocPhan::all();
        return view('lichgiang.phancong', [
            'lop' => $lop,
            'hocphan' => $hocphan,
            
        ]);
    }
    public function index(){
        
        if(request()->ajax()) 
        {
       
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return \Response::json($data);
        }
        return view('lichgiang.lichgiangtuan'); 
    }

    
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Event::insert($insertArr);   
        return \Response::json($event);
    }

    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return Response::json($event);
    }

    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
   
        return Response::json($event);
    }
}

