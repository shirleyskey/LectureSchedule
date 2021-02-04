<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CongTac extends Model
{
    //
    protected $table = 'congtacs';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','gio_giang', 'gio_khoahoc', 'ten', 'bat_dau', 'ket_thuc', 'dia_diem'];
    
    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveCongTac($id, $data){
        if($id == 0){
            $congtac = new CongTac;
        }else{
            $congtac = CongTac::findOrFail($id);
        }
        $congtac->id_giangvien = $data['id_giangvien'];
        $congtac->ten = $data['ten'];
        $congtac->dia_diem = $data['dia_diem'];
        $congtac->gio_giang = $data['gio_giang'];
        $congtac->gio_khoahoc = $data['gio_khoahoc'];
        $congtac->bat_dau = Carbon::parse($data['bat_dau'])->format('Y-m-d');
        $congtac->ket_thuc = Carbon::parse($data['ket_thuc'])->format('Y-m-d');
        $congtac->ghichu = $data['ghichu'];
        $congtac->save();
        return $congtac;
    }

}
