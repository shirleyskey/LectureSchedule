<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNckh extends Model
{
    //
    protected $table = 'loai_nckhs';
    public $timestamps = false;
    protected $fillable = ['ten'];

    
}
