<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XayDung extends Model
{
    //
    protected $table = 'xaydungs';

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }


}
