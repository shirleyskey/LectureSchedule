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
        return $this->hasMany('App\HocPhan', 'id_lop');
    }
    public function tiets()
    {
        return $this->hasMany('App\Tiet', 'id_lop');
    }
    
    public function delete() {
        $this->hocphans()->delete();
        $this->tiets()->delete();
        parent::delete();
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
