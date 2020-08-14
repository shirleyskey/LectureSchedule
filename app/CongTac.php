<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongTac extends Model
{
    //
    protected $table = 'congtacs';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
