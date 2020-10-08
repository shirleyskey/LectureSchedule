<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DotXuat extends Model
{
    //
    protected $table = 'dotxuats';
    public $timestamps = false;
    protected $fillable = ['id_giangvien','ghichu', 'ten', 'thoigian'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveDotXuat($id, $data){
        if($id == 0){
            $dotxuat = new DotXuat;
        }else{
            $dotxuat = DotXuat::findOrFail($id);
        }
        $dotxuat->id_giangvien = $data['id_giangvien'];
        $dotxuat->ten = $data['ten'];
        $dotxuat->ghichu = $data['ghichu'];
        $dotxuat->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $dotxuat->save();
        return $dotxuat;
    }

}
