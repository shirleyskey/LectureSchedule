<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tuan extends Model
{
    //
    protected $table = 'tuans';
    protected $fillable = ['id','thoi_gian','gio','dia_diem', 'noi_dung', 'thanh_phan', 'truc_ban'];
    public $timestamps = false;

    public static function saveTuan($id, $data){
        if($id == 0 || $id == -1){
            $tuan = new Tuan;
        }else{
            $tuan = Tuan::findOrFail($id);
        }
        $tuan->thoi_gian =  Carbon::parse($data['thoi_gian'])->format('Y-m-d h:i:s');
        $tuan->dia_diem = $data['dia_diem'];
        $tuan->noi_dung = $data['noi_dung'];
        $tuan->thanh_phan = $data['thanh_phan'];
        $tuan->truc_ban = $data['truc_ban'];
        $tuan->ghi_chu = $data['ghi_chu'];
        $tuan->save();
        return $tuan;
    }


}
