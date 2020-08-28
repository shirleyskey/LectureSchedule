<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuanAn extends Model
{
    //
    protected $table = 'luanans';

    public $timestamps = false;
    protected $fillable = ['ten'];


    public static function saveLuanAn($id, $data){
        if($id == 0){
            $luanan = new LuanAn;
        }else{
            $luanan = LuanAn::findOrFail($id);
        }
        $luanan->ten = $data['ten'];
        $luanan->ten = $data['huongdanchinh'];
        $luanan->ten = $data['huongdanphu'];
        $luanan->ten = $data['vietnam'];
        $luanan->docnhanxet = json_encode($data['docnhanxet']);
        $luanan->chutichhoithao = json_encode($data['chutichcham']);
        $luanan->thanhvienhoithao = json_encode($data['thanhvienhoithao']);
        $luanan->chutichcham = json_encode($data['chutichcham']);
        $luanan->thanhviencham = json_encode($data['thanhviencham']);
        $luanan->cap = $data['cap'];
        $luanan->ghichu = $data['ghichu'];
        $luanan->save();
        return $luanan;
    }
}
