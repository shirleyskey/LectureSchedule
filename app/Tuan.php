<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tuan extends Model
{
    //
    protected $table = 'tuans';
    protected $fillable = ['id','thoi_gian'];
    public $timestamps = false;

    public function trucbans()
    {
        return $this->belongsTo('App\GiangVien', 'truc_ban');
    }
    public function trucgvs()
    {
        return $this->belongsTo('App\GiangVien', 'truc_gv');
    }


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
        $tuan->truc_gv = $data['truc_gv'];
        $tuan->ghi_chu = $data['ghi_chu'];
        $tuan->save();
        return $tuan;
    }


}
