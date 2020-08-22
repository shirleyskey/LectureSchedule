<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Event extends Model
{
    //
    protected $table = 'events';
    public $timestamps = false;
    public function bais()
    {
        return $this->belongsTo('App\Bai', 'id_bai');
    }

    public static function saveTiet($id, $data){
        if($id == 0){
            $tiet = new Event;
        }else{
            $tiet = Event::findOrFail($id);
        }
        $tiet->id_bai = $data['id_bai'];
        $tiet->title = $data['title'];
        $tiet->start = Carbon::parse($data['start'])->format('Y-m-d');
        $tiet->end = Carbon::parse($data['end'])->format('Y-m-d');
        $tiet->save();
        return $tiet;
    }
}
