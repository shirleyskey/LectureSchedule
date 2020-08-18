<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CongTac extends Model
{
    //
    protected $table = 'congtacs';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','tiendo', 'ten', 'thoigian'];
    
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
        $congtac->tiendo = $data['tiendo'];
        $congtac->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $congtac->save();
        return $congtac;
    }

}
