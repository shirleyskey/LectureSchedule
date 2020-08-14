<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nckh extends Model
{
    //
    protected $table = 'nckhs';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
