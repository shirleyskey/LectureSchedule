<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiet extends Model
{
    //
    protected $table = 'tiets';
    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }

    public function bais()
    {
        return $this->belongsTo('App\Bai', 'id_bai');
    }

    public function hocphans()
    {
        return $this->belongsTo('App\Hocphan', 'id_hocphan');
    }

    public function giangviens()
    {
        return $this->belongsTo('App\User', 'id_giangvien');
    }
}
