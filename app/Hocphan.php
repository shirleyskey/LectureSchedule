<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    //
    protected $table = 'hocphans';

    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }

    public function bais()
    {
        return $this->hasMany('App\Bai', 'id_hocphan');
    }

    public function tiets()
    {
        return $this->hasMany('App\Tiet', 'id_hocphan');
    }

    public static function saveHocPhan($id, $data){
        if($id == 0){
            $hocphan = new HocPhan;
        }else{
            $hocphan = HocPhan::findOrFail($id);
        }
        $hocphan->id_lop = $data['id_lop'];
        $hocphan->sotiet = $data['sotiet'];
        $hocphan->tenhocphan = $data['tenhocphan'];
        $hocphan->sotinchi = $data['sotinchi'];
        $hocphan->sobai = $data['sobai'];
        $hocphan->start = Carbon::parse($data['start'])->format('Y-m-d');
        $hocphan->end = Carbon::parse($data['end'])->format('Y-m-d');
        $hocphan->save();
        return $hocphan;
    }
}
