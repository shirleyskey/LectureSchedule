<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuanVan extends Model
{
    //
    protected $table = 'luanvans';

    public $timestamps = false;
    protected $fillable = ['ten'];


    public static function saveLuanVan($id, $data){
        if($id == 0){
            $luanvan = new LuanVan;
        }else{
            $luanvan = LuanVan::findOrFail($id);
        }
        $luanvan->ten = $data['ten'];
        $luanvan->vietnam = $data['vietnam'];
        foreach ($data['huongdan'] as $key => $value) {
            $data['huongdan'][$key] = (int)$value;         
        }
        foreach ($data['chutich'] as $key => $value) {
            $data['chutich'][$key] = (int)$value;         
        }
        foreach ($data['phanbien'] as $key => $value) {
            $data['phanbien'][$key] = (int)$value;         
        }
        foreach ($data['thuky'] as $key => $value) {
            $data['thuky'][$key] = (int)$value;         
        }
        foreach ($data['uyvien'] as $key => $value) {
            $data['uyvien'][$key] = (int)$value;         
        }
        $luanvan->huongdan = json_encode($data['huongdan']);
        $luanvan->chutichcham = json_encode($data['chutich']);
        $luanvan->phanbiencham = json_encode($data['phanbien']);
        $luanvan->thukycham = json_encode($data['thuky']);
        $luanvan->uyviencham = json_encode($data['uyvien']);
        $luanvan->ghichu = $data['ghichu'];
        $luanvan->save();
        return $luanvan;
    }
}
