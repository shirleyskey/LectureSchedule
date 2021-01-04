<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $table = 'lops';
    public $timestamps = false;
    protected $fillable = ['id','malop','tenlop','quymo','he'];
    
    public function hocphans()
    {
        return $this->hasMany('App\Hocphan', 'id_lop');
    }

    public static function saveLop($id, $data){
        if($id == 0){
            $lop = new Lop;
        }else{
            $lop = Lop::findOrFail($id);
        }
        $lop->malop = $data['malop'];
        $lop->tenlop = $data['tenlop'];
        $lop->quymo = $data['quymo'];
        $lop->he = $data['he'];
        $lop->save();
        return $lop;
    }
  
}
