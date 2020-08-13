<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocphan extends Model
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
}
