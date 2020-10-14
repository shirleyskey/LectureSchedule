<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Tiet;
use App\EventModel;
use App\Lop;
use App\Bai;
use App\GiangVien;
use Calendar;
use App\Imports\CalenderImport;
use App\Imports\LopImport;
use Carbon\Carbon;
use DateTime;

class CalendarController extends Controller
{
    //
    public function index(){
        $events = [];
        $tiets = Tiet::all();
        if($tiets->count()){
            foreach($tiets as $tiet){
                $startDate = Carbon::parse($tiet->thoigian);
                
                if($tiet->buoi == "S" && $tiet->ca == "1"){
                    $startDate->addHours(7);
                    $startDate->addMinute(50);
                }
                else if($tiet->buoi == "S" && $tiet->ca == "2"){
                    $startDate->addHours(9);
                    $startDate->addMinute(30);
                }
                else if($tiet->buoi == "C" && $tiet->ca == "1"){
                    $startDate->addHours(13);
                }
                else if($tiet->buoi == "C" && $tiet->ca == "2"){
                    $startDate->addHours(15);
                    
                }
                //Tên Lớp
                $tenlop = ($tiet->lops->malop) ? $tiet->lops->malop : "";

                //Tên Bài 
                $tenbai = ($tiet->bais->tenbai) ? $tiet->bais->tenbai : "";

                // Tên Giáo Viên 
                $giangvien = GiangVien::where('id', $tiet->id_giangvien)->first();
                $tengiangvien = $giangvien["ten"];

                $title = $tenlop. " - ".$tenbai.'-'.$tengiangvien;
                $events[] = Calendar::event(
                    $title,
                    false,
                    new DateTime($startDate),
                    new DateTime($startDate->addMinute(110)),
                    $tiet->id,
                    [
                        'color' => '#ff6100',
                        'url' => route('lichgiang.lichgiangtuan.get', $tiet->id)
                    ]
                );
                }
                //End for tiết

            }
            //end foreach Event
        


        $calendar = Calendar::addEvents($events)->setOptions([
            'lang' => 'vi',
            'header' =>
                    [
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'month,basicWeek,list',
                    ],
        ]);
        return view('calendar.calendar', ['calendar' => $calendar]);
    }

    public function import(Request $request)
    {
        Excel::import(new CalenderImport, $request->calendar);
        // Excel::import(new LopImport, $request->calendar);

        return redirect()->route('lichgiang.lichgiangtuan');
    }

}
