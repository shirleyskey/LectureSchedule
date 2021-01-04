<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    //
    protected $table = 'giangviens';
    protected $fillable = ['ten','cothegiang', 'ma_giangvien'];

    public $timestamps = false;
    public function chambais()
    {
        return $this->hasMany('App\ChamBai', 'id_giangvien');
    }

    public function congtacs()
    {
        return $this->hasMany('App\CongTac', 'id_giangvien');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id_giangvien');
    }

    public function dangs()
    {
        return $this->hasMany('App\Dang', 'id_giangvien');
    }

    public function hoctaps()
    {
        return $this->hasMany('App\HocTap', 'id_giangvien');
    }
   
    public function xaydungs()
    {
        return $this->hasMany('App\XayDung', 'id_giangvien');
    }

    
    public function tiets()
    {
        return $this->hasMany('App\Tiet', 'id_giangvien');
    }

    public function hops()
    {
        return $this->hasMany('App\Hop', 'id_giangvien');
    }



    public static function saveGiangVien($id, $data){
        if($id == 0 || $id == -1){
            $giangvien = new GiangVien;
        }else{
            $giangvien = GiangVien::findOrFail($id);
        }
        $giangvien->ten = $data['ten'];
        $giangvien->chucvu = $data['chucvu'];
        $giangvien->hesoluong = $data['hesoluong'];
        $giangvien->diachi = $data['diachi'];
        $giangvien->ma_giangvien = $data['ma_giangvien'];
        $giangvien->bai_giang = $data['bai_giang'];
        $giangvien->chucdanh = $data['chucdanh'];
        $giangvien->trinhdo = $data['trinhdo'];
        $giangvien->cothegiang = $data['cothegiang'];

        $giangvien->save();
        return $giangvien;
    }


}



