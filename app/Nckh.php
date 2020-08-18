<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Nckh extends Model
{
    //
    protected $table = 'nckhs';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','tiendo', 'ten', 'thoigian'];
    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveNckh($id, $data){
        if($id == 0){
            $nckh = new Nckh;
        }else{
            $nckh = Nckh::findOrFail($id);
        }
        $nckh->id_giangvien = $data['id_giangvien'];
        $nckh->ten = $data['ten'];
        $nckh->tiendo = $data['tiendo'];
        $nckh->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $nckh->save();
        return $nckh;
    }

}
