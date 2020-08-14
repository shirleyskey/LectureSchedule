<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    //
    protected $table = 'giangviens';

    public function chambais()
    {
        return $this->hasMany('App\ChamBai', 'id_giangvien');
    }

    public function congtacs()
    {
        return $this->hasMany('App\CongTac', 'id_giangvien');
    }

    public function dangs()
    {
        return $this->hasMany('App\Dang', 'id_giangvien');
    }

    public function hoctaps()
    {
        return $this->hasMany('App\HocTap', 'id_giangvien');
    }

    public function nckhs()
    {
        return $this->hasMany('App\Nckh', 'id_giangvien');
    }

    public function sangkiens()
    {
        return $this->hasMany('App\SangKien', 'id_giangvien');
    }
 
    public function xaydungs()
    {
        return $this->hasMany('App\XayDung', 'id_giangvien');
    }
}



