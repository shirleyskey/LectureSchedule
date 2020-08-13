<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $table = 'lops';
    public function hocphans()
    {
        return $this->hasMany('App\Hocphan', 'id_lop');
    }
}
