<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ChamBai extends Model
{
    //
    protected $table = 'chambais';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','thoigian'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveChamBai($id, $data){
        if($id == 0){
            $chambai = new ChamBai;
        }else{
            $chambai = ChamBai::findOrFail($id);
        }
        $chambai->id_giangvien = $data['id_giangvien'];
        $chambai->ghichu = $data['ghichu'];
        $chambai->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $chambai->save();
        return $chambai;
    }



}
