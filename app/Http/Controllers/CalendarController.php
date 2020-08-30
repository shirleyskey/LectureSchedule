<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Event;
use App\EventModel;
use App\Lop;
use App\Bai;
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
        $tiets = Event::all();
        if($tiets->count()){
            foreach($tiets as $tiet){
                $startDate = Carbon::parse($tiet->thoigian);
                $time = explode(",", trim($tiet->lesson));
                //Start for tiết
                for($i = 0 ; $i < count($time); $i++){
                    $startDate = Carbon::parse($tiet->thoigian);
                    //Start Switch case 
                    switch ((int)$time[$i]) {
                        case 1:
                            $startDate->addHours(7);
                            $startDate->addMinute(50);
                            break;
                        case 2:
                            $startDate->addHours(8);
                            $startDate->addMinute(30);
                            break;
                        case 3:
                            $startDate->addHours(9);
                            $startDate->addMinute(30);
                            break;
                        case 4:
                            $startDate->addHours(10);
                            $startDate->addMinute(30);
                            break;
                        case 5:
                            $startDate->addHours(13);
                            break;
                        case 6:
                            $startDate->addHours(14);
                            break;
                        case 7:
                            $startDate->addHours(15);
                            break;
                        case 8:
                            $startDate->addHours(16);
                            break;
                        default:
                            $startDate->addHours(7);
                            $startDate->addMinute(30);
                            break;
                    }
                    //End Switch case
                    // dd($tiet->lops->tenlop);
                    $thututiet = (int)$time[$i];
                    $giaovien = ($tiet->id_giangvien) ? $tiet->giangviens->ten : 'Chưa phân';
                    $title = $tiet->lops->malop." - ". $tiet->bais->tenbai." - ".$giaovien;
                    $events[] = Calendar::event(
                        $title,
                        false,
                        new DateTime($startDate),
                        new DateTime($startDate->addMinute(50)),
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
        }
      

        $calendar = Calendar::addEvents($events)->setOptions(['lang' => 'vi']);
        return view('calendar.calendar', ['calendar' => $calendar]);
    }

public function import(Request $request)
{
    Excel::import(new CalenderImport, $request->calendar);
    // Excel::import(new LopImport, $request->calendar);

    return redirect()->route('lichgiang.lichgiangtuan');
}
    
}
