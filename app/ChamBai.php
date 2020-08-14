<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamBai extends Model
{
    //
    protected $table = 'chambais';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
