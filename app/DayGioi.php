<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayGioi extends Model
{
    //
    protected $table = 'daygiois';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

}
