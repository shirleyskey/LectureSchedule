<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Tiet;
use App\Bai;
use Carbon\Carbon;

class TietController extends Controller
{
    //
      //Calendar 
      public function edit($id){
        $tiet = Tiet::findOrFail($id);
        $id_hocphan = $tiet->hocphans->id;
        $bai = Bai::where('id_hocphan', $id_hocphan)->get();
        return view('calendar.calendar-edit', [
            'tiet' => $tiet,
            'bai' => $bai
        ]);
    }
}
