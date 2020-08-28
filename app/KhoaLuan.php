<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaLuan extends Model
{
    //
    protected $table = 'khoaluans';

    public $timestamps = false;
    protected $fillable = ['ten'];


    public static function saveKhoaLuan($id, $data){
        if($id == 0){
            $khoaluan = new KhoaLuan;
        }else{
            $khoaluan = KhoaLuan::findOrFail($id);
        }
        $khoaluan->ten = $data['ten'];
        foreach ($data['huongdan'] as $key => $value) {
            $data['huongdan'][$key] = (int)$value;         
        }
        foreach ($data['chutichcham'] as $key => $value) {
            $data['chutichcham'][$key] = (int)$value;         
        }
        foreach ($data['thamgiacham'] as $key => $value) {
            $data['thamgiacham'][$key] = (int)$value;         
        }
        $khoaluan->huongdan = json_encode($data['huongdan']);
        $khoaluan->chutichcham = json_encode($data['chutichcham']);
        $khoaluan->thamgiacham = json_encode($data['thamgiacham']);
        $khoaluan->ghichu = $data['ghichu'];
        $khoaluan->save();
        return $khoaluan;
    }
}
