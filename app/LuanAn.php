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
        $luanan->huongdanchinh = (int)$data['huongdanchinh'];
        $luanan->huongdanphu = (int)$data['huongdanphu'];
        $luanan->vietnam = $data['vietnam'];
        foreach ($data['docnhanxet'] as $key => $value) {
            $data['docnhanxet'][$key] = (int)$value;         
        }
        foreach ($data['chutichhoithao'] as $key => $value) {
            $data['chutichhoithao'][$key] = (int)$value;         
        }
        foreach ($data['thanhvienhoithao'] as $key => $value) {
            $data['thanhvienhoithao'][$key] = (int)$value;         
        }
        foreach ($data['chutichcham'] as $key => $value) {
            $data['chutichcham'][$key] = (int)$value;         
        }
        foreach ($data['thanhviencham'] as $key => $value) {
            $data['thanhviencham'][$key] = (int)$value;         
        }
        $luanan->docnhanxet = json_encode($data['docnhanxet']);
        $luanan->chutichhoithao = json_encode($data['chutichhoithao']);
        $luanan->thanhvienhoithao = json_encode($data['thanhvienhoithao']);
        $luanan->chutichcham = json_encode($data['chutichcham']);
        $luanan->thanhviencham = json_encode($data['thanhviencham']);
        $luanan->cap = $data['cap'];
        $luanan->ghichu = $data['ghichu'];
        $luanan->save();
        return $luanan;
    }
}
