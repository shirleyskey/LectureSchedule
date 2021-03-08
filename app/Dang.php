<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Dang extends Model
{
    //
    protected $table = 'dangs';

    public $timestamps = false;
    protected $fillable = ['ten', 'dia_diem', 'chu_tri', 'tham_gia','bat_dau','ket_thuc'];
    

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveDang($id, $data){
        if($id == 0){
            $dang = new Dang;
        }else{
            $dang = Dang::findOrFail($id);
        }
        $dang->ten = $data['ten'];
        $dang->dia_diem = $data['dia_diem'];
        foreach ($data['chu_tri'] as $key => $value) {
            $data['chu_tri'][$key] = (int)$value;         
        }
        foreach ($data['tham_gia'] as $key => $value) {
            $data['tham_gia'][$key] = (int)$value;         
        }
       
        $dang->chu_tri = json_encode($data['chu_tri']);
        $dang->tham_gia = json_encode($data['tham_gia']);
        $dang->bat_dau = Carbon::parse($data['bat_dau'])->format('Y-m-d');
        $dang->ket_thuc = Carbon::parse($data['ket_thuc'])->format('Y-m-d');
        $dang->hoan_thanh = ($data['hoan_thanh']) ? Carbon::parse($data['hoan_thanh'])->format('Y-m-d') : NULL ;
        $dang->ghichu = $data['ghichu'];
        $dang->gio_giang = $data['gio_giang'];
        $dang->save();
        return $dang;
    }
}
