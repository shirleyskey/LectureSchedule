<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DotXuat extends Model
{
    //
    protected $table = 'dotxuats';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
