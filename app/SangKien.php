<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SangKien extends Model
{
    //
    protected $table = 'sangkiens';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
