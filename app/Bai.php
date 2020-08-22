<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bai extends Model
{
    //
    protected $table = 'bais';

    public function hocphans()
    {
        return $this->belongsTo('App\Hocphan', 'id_hocphan');
    }

    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'id_bai');
    }

    public static function saveBai($id, $data){
        if($id == 0){
            $bai = new Bai;
        }else{
            $bai = Bai::findOrFail($id);
        }
        $bai->id_hocphan = $data['id_hocphan'];
        $bai->sotiet = $data['sotiet'];
        $bai->tenbai = $data['tenbai'];
        $bai->id_giangvien = $data['id_giangvien'];
        $bai->save();
        return $bai;
    }
}
