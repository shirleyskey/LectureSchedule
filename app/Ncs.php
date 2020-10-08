<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncs extends Model
{
    //
    protected $table = 'nghiencuu';

    public $timestamps = false;
    protected $fillable = ['ten'];


    public static function saveNCS($id, $data){
        if($id == 0){
            $ncs = new Ncs;
        }else{
            $ncs = Ncs::findOrFail($id);
        }
        $ncs->ten = $data['ten'];
        foreach ($data['thanhvien'] as $key => $value) {
            $data['thanhvien'][$key] = (int)$value;         
        }
        foreach ($data['thuky'] as $key => $value) {
            $data['thuky'][$key] = (int)$value;         
        }
        $ncs->thanhvien = json_encode($data['thanhvien']);
        $ncs->thuky = json_encode($data['thuky']);
        $ncs->ghichu = $data['ghichu'];
        $ncs->save();
        return $ncs;
    }
}
