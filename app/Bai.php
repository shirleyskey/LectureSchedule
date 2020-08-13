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

    public function tiets()
    {
        return $this->hasMany('App\Tiet', 'id_bai');
    }
}
