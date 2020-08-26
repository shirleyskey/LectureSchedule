<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    //
    protected $table = 'hocphans';
    public $timestamps = false;

    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }

    public function bais()
    {
        return $this->hasMany('App\Bai', 'id_hocphan');
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'id_hocphan');
    }

    public static function saveHocPhan($id, $data){
        if($id == 0){
            $hocphan = new HocPhan;
        }else{
            $hocphan = HocPhan::findOrFail($id);
        }
        $hocphan->id_lop = $data['id_lop'];
        $hocphan->mahocphan = $data['mahocphan'];
        $hocphan->tenhocphan = $data['tenhocphan'];
        $hocphan->sotiet = $data['sotiet'];
        $hocphan->sotinchi = $data['sotinchi'];
        $hocphan->start = Carbon::parse($data['start'])->format('Y-m-d');
        $hocphan->end = Carbon::parse($data['end'])->format('Y-m-d');
        $hocphan->save();
        return $hocphan;
    }
}
