<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ChamBai extends Model
{
    //
    protected $table = 'chambais';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','thoigian', 'id_lop', 'id_hocphan'];

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
        $chambai->id_lop = $data['id_lop'];
        $chambai->id_hocphan = $data['id_hocphan'];
        $chambai->so_bai = $data['so_bai'];
        $chambai->so_gio = $data['so_gio'];
        $chambai->ghichu = $data['ghichu'];
        $chambai->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $chambai->save();
        return $chambai;
    }



}
