<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SangKien extends Model
{
    //
    protected $table = 'sangkiens';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','ghichu', 'ten', 'thoigian'];
    

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveSangKien($id, $data){
        if($id == 0){
            $sangkien = new SangKien;
        }else{
            $sangkien = SangKien::findOrFail($id);
        }
        $sangkien->id_giangvien = $data['id_giangvien'];
        $sangkien->ten = $data['ten'];
        $sangkien->ghichu = $data['ghichu'];
        $sangkien->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $sangkien->save();
        return $sangkien;
    }

}
