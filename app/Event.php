<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Event extends Model
{
    //
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = ['id','id_lop','id_hocphan','thoigian','lesson'];
    public function bais()
    {
        return $this->belongsTo('App\Bai', 'id_bai');
    }
    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }
    public function hocphans()
    {
        return $this->belongsTo('App\HocPhan', 'id_hocphan');
    }

    public static function saveTiet($id, $data){
        if($id == 0){
            $tiet = new Event;
        }else{
            $tiet = Event::findOrFail($id);
        }
        $tiet->id_bai = $data['id_lop'];
        $tiet->id_bai = $data['id_hocphan'];
        $tiet->id_bai = $data['id_bai'];
        $tiet->thoigian = $data['thoigian'];
        $tiet->lession = $data['lession'];
        $tiet->title = $data['title'];
        $tiet->start = Carbon::parse($data['start'])->format('Y-m-d\TH:i');
        $tiet->end = Carbon::parse($data['end'])->format('Y-m-d\TH:i');
        $tiet->save();
        return $tiet;
    }
}
