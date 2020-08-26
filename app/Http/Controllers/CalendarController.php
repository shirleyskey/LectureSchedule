<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Event;
use App\Lop;
use App\Bai;
use Calendar;
use App\Imports\CalenderImport;
use Carbon\Carbon;
use DateTime;

class CalendarController extends Controller
{
    //
    public function index(){
        $events = [];
        $calendar = Calendar::addEvents($events);
        return view('calendar.calendar', [
            'calendar' => $calendar
        ]);
    }

    public function import(Request $request)
{
    Excel::import(new CalenderImport, $request->calender);

    return redirect('/lichgiangtuan');
}
    
}
