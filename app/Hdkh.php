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
     protected $fillable = ['id_giangvien', 'khoa_luan', 'luan_van', 'luan_an', 'hoc_vien', 'khoa', 'so_gio'];
     
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
         $hdkh->luan_van = $data['luan_van'];
         $hdkh->luan_an = $data['luan_an'];
         $hdkh->hoc_vien = $data['hoc_vien'];
         $hdkh->khoa = $data['khoa'];
         $hdkh->so_gio = $data['so_gio'];
         $hdkh->ghichu = $data['ghichu'];
        
         $hdkh->save();
         return $hdkh;
     }
}
