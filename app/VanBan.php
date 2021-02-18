<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VanBan extends Model
{
    //
    protected $table = 'vanbans';
    public $timestamps = false;
    protected $fillable = ['id','lanhdao','noi_dung', 'chu_tri','tham_gia','thoigian_nhan', 'thoigian_den'];
    
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
        $vanban->lanhdao = $data['lanhdao'];
        foreach ($data['chu_tri'] as $key => $value) {
            $data['chu_tri'][$key] = (int)$value;         
        }
        foreach ($data['tham_gia'] as $key => $value) {
            $data['tham_gia'][$key] = (int)$value;         
        }
        $vanban->chu_tri = json_encode($data['chu_tri']);
        $vanban->tham_gia = json_encode($data['tham_gia']);
        $vanban->noi_dung = $data['noi_dung'];
        $vanban->ghichu = $data['ghichu'];
        $vanban->thoigian_nhan = Carbon::parse($data['thoigian_nhan'])->format('Y-m-d');
        $vanban->thoigian_den = Carbon::parse($data['thoigian_den'])->format('Y-m-d');
        $vanban->hoan_thanh = ($data['hoan_thanh']) ? Carbon::parse($data['hoan_thanh'])->format('Y-m-d') : NULL ;
        $vanban->save();
        return $vanban;
    }
}
