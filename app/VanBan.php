<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VanBan extends Model
{
    //
    protected $table = 'vanbans';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','id','lanhdao','noi_dung'];
    
    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveVanBan($id, $data){
        if($id == 0){
            $vanban = new VanBan;
        }else{
            $vanban = VanBan::findOrFail($id);
        }
        $vanban->id_giangvien = $data['id_giangvien'];
        $vanban->lanhdao = $data['lanhdao'];
        $vanban->noi_dung = $data['noi_dung'];
        $vanban->ghichu = $data['ghichu'];
        $vanban->thoigian_nhan = Carbon::parse($data['thoigian_nhan'])->format('Y-m-d');
        $vanban->thoigian_den = Carbon::parse($data['thoigian_den'])->format('Y-m-d');
        $vanban->save();
        return $vanban;
    }
}
