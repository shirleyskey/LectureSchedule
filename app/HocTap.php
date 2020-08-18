<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
    
class HocTap extends Model
{
    //
    protected $table = 'hoctaps';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','ghichu', 'ten', 'thoigian'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function savehoctap($id, $data){
        if($id == 0){
            $hoctap = new HocTap;
        }else{
            $hoctap = HocTap::findOrFail($id);
        }
        $hoctap->id_giangvien = $data['id_giangvien'];
        $hoctap->ten = $data['ten'];
        $hoctap->ghichu = $data['ghichu'];
        $hoctap->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $hoctap->save();
        return $hoctap;
    }

}
