<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hop extends Model
{
    //
     //
     protected $table = 'hops';
     public $timestamps = false;
     protected $fillable = ['id_giangvien','ten', 'so_gio', 'thoigian'];
 
     public function giangviens()
     {
         return $this->belongsTo('App\GiangVien', 'id_giangvien');
     }
 
     public static function saveHop($id, $data){
         if($id == 0){
             $hop = new Hop;
         }else{
             $hop = Hop::findOrFail($id);
         }
         $hop->id_giangvien = $data['id_giangvien'];
         $hop->ten = $data['ten'];
         $hop->dia_diem = $data['dia_diem'];
         $hop->ghichu = $data['ghichu'];
         $hop->giogiang = $data['giogiang'];
         $hop->giokhoahoc = $data['giokhoahoc'];
         $hop->batdau = Carbon::parse($data['batdau'])->format('Y-m-d');
         $hop->ketthuc = Carbon::parse($data['ketthuc'])->format('Y-m-d');
         $hop->save();
         return $hop;
     }
}
