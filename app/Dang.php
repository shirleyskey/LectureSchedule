<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dang extends Model
{
    //
    protected $table = 'dangs';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
