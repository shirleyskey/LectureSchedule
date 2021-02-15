<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ChamBai extends Model
{
    //
    protected $table = 'chambais';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','bat_dau','ket_thuc', 'lop','so_bai', 'gio_giang', 'gio_khoahoc', 'hoc_phan', 'giua_hoc_phan', 'cdtn'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }
    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }
    public function hocphans()
    {
        return $this->belongsTo('App\HocPhan', 'id_hocphan');
    }

    public static function saveChamBai($id, $data){
        if($id == 0){
            $chambai = new ChamBai;
        }else{
            $chambai = ChamBai::findOrFail($id);
        }
        $chambai->id_giangvien = $data['id_giangvien'];
        $chambai->lop = $data['lop'];
        $chambai->hoc_phan = $data['hoc_phan'];
        $chambai->giua_hoc_phan = $data['giua_hoc_phan'];
        $chambai->cdtn = $data['cdtn'];
        $chambai->so_bai = $data['so_bai'];
        $chambai->gio_giang = $data['gio_giang'];
        $chambai->gio_khoahoc = $data['gio_khoahoc'];
        $chambai->bat_dau = Carbon::parse($data['bat_dau'])->format('Y-m-d');
        $chambai->ket_thuc = Carbon::parse($data['ket_thuc'])->format('Y-m-d');
        $chambai->ghichu = $data['ghichu'];
        $chambai->save();
        return $chambai;
    }



}
