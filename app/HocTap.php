<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocTap extends Model
{
    //
    protected $table = 'hoctaps';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
