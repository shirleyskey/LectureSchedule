<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Lop;
use App\Bai;
use App\Nckh;
use Calendar;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    //
    public function index($id){
        $events = [];
        $tiets = Event::where('id_giangvien', $id)->get();
       
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
                            $startDate->addMinute(00);
                            break;
                        case 6:
                            $startDate->addHours(14);
                            $startDate->addMinute(00);
                            break;
                        case 7:
                            $startDate->addHours(15);
                            $startDate->addMinute(00);
                            break;
                        case 8:
                            $startDate->addHours(16);
                            $startDate->addMinute(00);
                            break;
                        default:
                            $startDate->addHours(7);
                            $startDate->addMinute(30);
                            break;
                    }
                    //End Switch case
                    // dd($tiet->lops->tenlop);
                    $thututiet = (int)$time[$i];
                    $title = $tiet->lops->malop."-".$tiet->hocphans->mahocphan."-".$tiet->bais->tenbai;
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
        return view('calendar.thongbao', ['calendar' => $calendar]);
    }
    
}
