<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hdkh extends Model
{
    //
     //
     protected $table = 'hdkh';
     public $timestamps = false;
     protected $fillable = ['id_giangvien', 'khoa_luan', 'luan_van', 'luan_an','hoc_vien', 'khoa', 'gio_giang', 'gio_khoahoc','sinhvien_nc', 'bat_dau', 'ket_thuc'];
     
     public function giangviens()
     {
         return $this->belongsTo('App\GiangVien', 'id_giangvien');
     }
   
 
     public static function saveHdkh($id, $data){
         if($id == 0){
             $hdkh = new Hdkh;
         }else{
             $hdkh = Hdkh::findOrFail($id);
         }
         $hdkh->id_giangvien = $data["id_giangvien"];
         $hdkh->khoa_luan = $data['khoa_luan'];
         $hdkh->sinhvien_nc = $data['sinhvien_nc'];
         $hdkh->luan_van = $data['luan_van'];
         $hdkh->luan_an = $data['luan_an'];
         $hdkh->hoc_vien = $data['hoc_vien'];
         $hdkh->bat_dau = Carbon::parse($data['bat_dau'])->format('Y-m-d');
         $hdkh->ket_thuc = Carbon::parse($data['ket_thuc'])->format('Y-m-d');
         $hdkh->khoa = $data['khoa'];
         $hdkh->gio_giang = $data['gio_giang'];
         $hdkh->gio_khoahoc = $data['gio_khoahoc'];
         $hdkh->ghichu = $data['ghichu'];
        
         $hdkh->save();
         return $hdkh;
     }
}
