<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tiet extends Model
{
    //
     //
     protected $table = 'tiets';
     public $timestamps = false;
     protected $fillable = ['id','id_lop','id_hocphan','id_bai','id_giangvien','thoigian','buoi','ca'];
     
     public function bais()
     {
         return $this->belongsTo('App\Bai', 'id_bai');
     }
     public function lops()
     {
         return $this->belongsTo('App\Lop', 'id_lop');
     }
     public function hocphans()
     {
         return $this->belongsTo('App\HocPhan', 'id_hocphan');
     }
      public function giangviens()
     {
         return $this->belongsTo('App\GiangVien', 'id_giangvien');
     }
 
     public static function saveTiet($id, $data){
         if($id == 0){
             $tiet = new Tiet;
         }else{
             $tiet = Tiet::findOrFail($id);
         }
         $tiet->id_lop = $data['id_lop'];
         $tiet->id_hocphan = $data['id_hocphan'];
         $tiet->id_bai = $data['id_bai'];
         $tiet->thoigian = $data['thoigian'];
         $tiet->buoi = $data['buoi'];
         $tiet->ca = $data['ca'];
         $tiet->id_giangvien = $data['id_giangvien'];
         $tiet->save();
         return $tiet;
     }
}
