<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;

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
