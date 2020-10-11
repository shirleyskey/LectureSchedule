<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Dang extends Model
{
    //
    protected $table = 'dangs';

    public $timestamps = false;
    protected $fillable = ['id_giangvien', 'ten'];
    

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveDang($id, $data){
        if($id == 0){
            $dang = new Dang;
        }else{
            $dang = Dang::findOrFail($id);
        }
        $dang->id_giangvien = $data['id_giangvien'];
        $dang->ten = $data['ten'];
        $dang->ket_qua = $data['ket_qua'];
        $dang->vai_tro = $data['vai_tro'];
        $dang->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $dang->save();
        return $dang;
    }
}
