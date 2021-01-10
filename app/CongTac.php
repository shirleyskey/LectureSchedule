<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CongTac extends Model
{
    //
    protected $table = 'congtacs';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','so_gio', 'ten', 'thoigian'];
    
    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveCongTac($id, $data){
        if($id == 0){
            $congtac = new CongTac;
        }else{
            $congtac = CongTac::findOrFail($id);
        }
        $congtac->id_giangvien = $data['id_giangvien'];
        $congtac->ten = $data['ten'];
        $congtac->so_gio = $data['so_gio'];
        $congtac->ghichu = $data['ghichu'];
        $congtac->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $congtac->save();
        return $congtac;
    }

}
