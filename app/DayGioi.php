<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class DayGioi extends Model
{
    //
    protected $table = 'daygiois';

    public $timestamps = false;
    protected $fillable = ['id_giangvien','ghichu', 'ten', 'thoigian'];

    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public static function saveDayGioi($id, $data){
        if($id == 0){
            $daygioi = new DayGioi;
        }else{
            $daygioi = DayGioi::findOrFail($id);
        }
        $daygioi->id_giangvien = $data['id_giangvien'];
        $daygioi->ten = $data['ten'];
        $daygioi->ghichu = $data['ghichu'];
        $daygioi->thoigian = Carbon::parse($data['thoigian'])->format('Y-m-d');
        $daygioi->save();
        return $daygioi;
    }

}
