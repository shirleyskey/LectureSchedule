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
         $hop->ghichu = $data['ghichu'];
         $hop->so_gio = $data['so_gio'];
         $hop->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
         $hop->save();
         return $hop;
     }
}
