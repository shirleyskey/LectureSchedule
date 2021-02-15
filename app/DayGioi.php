<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class DayGioi extends Model
{
    //
    protected $table = 'daygiois';

    public $timestamps = false;
    protected $fillable = ['id_giangvien', 'ten', 'cap_bo', 'cap_hoc_vien','cap_khoa', 'gio_giang','gio_khoahoc', 'bat_dau','ket_thuc'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveDayGioi($id, $data){
        if($id == 0){
            $daygioi = new DayGioi;
        }else{
            $daygioi = DayGioi::findOrFail($id);
        }
        $daygioi->id_giangvien = $data['id_giangvien'];
        $daygioi->ten = $data['ten'];
        $daygioi->cap_bo = $data['cap_bo'];
        $daygioi->cap_hoc_vien = $data['cap_hoc_vien'];
        $daygioi->cap_khoa = $data['cap_khoa'];
        $daygioi->gio_giang = $data['gio_giang'];
        $daygioi->gio_khoahoc = $data['gio_khoahoc'];
        $daygioi->bat_dau = Carbon::parse($data['bat_dau'])->format('Y-m-d');
        $daygioi->ket_thuc = Carbon::parse($data['ket_thuc'])->format('Y-m-d');
        $daygioi->ghichu = $data['ghichu'];
        $daygioi->save();
        return $daygioi;
    }

}
