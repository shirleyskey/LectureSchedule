<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class XayDung extends Model
{
    //
    protected $table = 'xaydungs';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','ten', 'hocphan', 'khoa','vai_tro', 'thoigian'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveXayDung($id, $data){
        if($id == 0){
            $xaydung = new XayDung;
        }else{
            $xaydung = XayDung::findOrFail($id);
        }
        $xaydung->id_giangvien = $data['id_giangvien'];
        $xaydung->ten = $data['ten'];
        $xaydung->ghichu = $data['ghichu'];
        $xaydung->hocphan = $data['hocphan'];
        $xaydung->khoa = $data['khoa'];
        $xaydung->vai_tro = $data['vai_tro'];
        $xaydung->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $xaydung->save();
        return $xaydung;
    }


}
