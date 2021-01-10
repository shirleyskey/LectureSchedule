<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    //
    protected $table = 'hocphans';
    public $timestamps = false;
    protected $fillable = ['id','id_lop','mahocphan','tenhocphan','sotinchi'];

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

    public function chambais()
    {
        return $this->hasMany('App\ChamBai', 'id_hocphan');
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
        $hocphan->sotinchi = $data['sotinchi'];
        $hocphan->save();
        return $hocphan;
    }
}
