<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bai extends Model
{
    //
    protected $table = 'bais';
     public $timestamps = false;
     protected $fillable = ['id','id_hocphan','tenbai','sotiet'];

    public function hocphans()
    {
        return $this->belongsTo('App\HocPhan', 'id_hocphan');
    }

    public function lops()
    {
        return $this->belongsTo('App\Lop', 'id_lop');
    }

    public function tiets()
    {
        return $this->hasMany('App\Tiet', 'id_bai');
    }

    public function delete() {
        $this->tiets()->delete();
        parent::delete();
    }


    public static function saveBai($id, $data){
        if($id == 0){
            $bai = new Bai;
        }else{
            $bai = Bai::findOrFail($id);
        }
        $bai->id_hocphan = $data['id_hocphan'];
        $bai->tenbai = $data['tenbai'];
        $bai->save();
        return $bai;
    }
}
