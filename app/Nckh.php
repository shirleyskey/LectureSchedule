<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Nckh extends Model
{
    //
    protected $table = 'nckhs';
    public $timestamps = false;
    protected $fillable = ['ten', 'capbo', 'thamkhao','sangkien','bao','theloai','chubien','thamgia','batdau','ketthuc','sotrang', 'songuoi'];
    
    public function giangviens()
    {
        return $this->belongsTo('App\GiangVien', 'id_giangvien');
    }

    public function theloais()
    {
        return $this->belongsTo('App\LoaiNckh', 'theloai');
    }

    public static function saveNckh($id, $data){
        if($id == 0){
            $nckh = new Nckh;
        }else{
            $nckh = Nckh::findOrFail($id);
        }
        $nckh->ten = $data["ten"];
        $nckh->capbo = $data['capbo'];
        $nckh->thamkhao = $data['thamkhao'];
        $nckh->sangkien = $data['sangkien'];
        $nckh->bao = $data['bao'];
        $nckh->theloai = $data['theloai'];
        foreach ($data['chubien'] as $key => $value) {
            $data['chubien'][$key] = (int)$value;         
        }
        foreach ($data['thamgia'] as $key => $value) {
            $data['thamgia'][$key] = (int)$value;         
        }
        $nckh->chubien = json_encode($data['chubien']);
        $nckh->thamgia = json_encode($data['thamgia']);
        $nckh->sotrang = $data['sotrang'];
        $nckh->songuoi = $data['songuoi'];
        $nckh->batdau = Carbon::parse($data['batdau'])->format('Y-m-d');
        $nckh->ketthuc = Carbon::parse($data['ketthuc'])->format('Y-m-d');
        $nckh->save();
        return $nckh;
    }

}
