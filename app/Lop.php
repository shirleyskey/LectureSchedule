<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $table = 'lops';
    public $timestamps = false;
    
    public function hocphans()
    {
        return $this->hasMany('App\Hocphan', 'id_lop');
    }
}
