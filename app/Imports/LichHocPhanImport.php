<?php

namespace App\Imports;

use App\Tiet;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Lop;
use App\HocPhan;
use App\Bai;
use App\GiangVien;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;

class LichHocPhanImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $id_hocphan = null;  
  

    /**
     * @var isValidFile
     */
    public $isValidFile = false;
    public $import_decision = true; 

    public function __construct($id) {
        $this->id_hocphan = $id;
        }

    public function headingRow(): int
    {
        return 9;
    }

    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
        try{
           
            foreach($rows as $row){
                if($row["thoi_gian"]){
                    //Get Lop
                    $lop = HocPhan::where('id', $this->id_hocphan)->first();
                    //Get Bai
                    $bai = $row["bai_giang"];
                    //Get Giang Vien
                    $ma_giangvien = $row["gv_thuc_hien"];
                    $giangvien = ($ma_giangvien == "") ? null : GiangVien::where('ma_giangvien', $ma_giangvien)->first();
                    
                    //Get Thoi Gian Sáng or Chiều
                    $buoi = $row["thoi_gian"][0];
                    $is_buoi = true;
                    if($buoi != "S" && $buoi != "C"){
                        $is_buoi = false;
                    }
                    $ca = $row["thoi_gian"][2];
                    $is_ca = true;
                    if($ca != "1" && $ca != "2" && $ca != 0){
                        $is_ca = false;
                    }
                    $so_tiet = $row["so_tiet"];
                    $tiendo = $row["tien_do"];
    
                    $ngay = explode(",", $row["thoi_gian"]);
                    
                    $dateFormat = DateTime::createFromFormat('d/m/Y', trim($ngay[1]))->format('Y-m-d');
                    $startDate = Carbon::create($dateFormat);
                    // dd($startDate);
                    if($is_buoi == false || $is_ca == false || $ngay == NULL || $so_tiet == "" || $tiendo == "" || $bai == ""){
                        $this->import_decision = false;
                        $this->isValidFile = true;
                    }
                    
                }
                
               }


            if($this->import_decision == true){
                foreach($rows as $row){
                    if($row["thoi_gian"]){
                        //Get Lop
                        $lop = HocPhan::where('id', $this->id_hocphan)->first();
                        //Get Bai
                        $bai = $row["bai_giang"];
                        if(Bai::where('id_hocphan', $this->id_hocphan)->where('tenbai',$bai)->exists()){
                            $them_bai = Bai::where('id_hocphan', $this->id_hocphan)->where('tenbai', $bai)->first();
                        }
                        else {
                            $them_bai = Bai::create([
                                'id_hocphan' => $this->id_hocphan,
                                'tenbai' => $bai,
                            ]);
                        }
                        //Get Giang Vien
                        $ma_giangvien = $row["gv_thuc_hien"];
                        $giangvien = ($ma_giangvien == "") ? null : GiangVien::where('ma_giangvien', $ma_giangvien)->first();
                        
                        //Get Thoi Gian Sáng or Chiều
                        $buoi = $row["thoi_gian"][0];
                        $ca = $row["thoi_gian"][2];
                        $so_tiet = $row["so_tiet"];
                        $tiendo = $row["tien_do"];
        
                        $ngay = explode(",", $row["thoi_gian"]);
                        
                        $dateFormat = DateTime::createFromFormat('d/m/Y', trim($ngay[1]))->format('Y-m-d');
                        $startDate = Carbon::create($dateFormat);
                        // dd($startDate);
                        $data["id_lop"] = $lop->id_lop;
                        $data["id_hocphan"] = $this->id_hocphan;
                        $data["id_bai"] = $them_bai->id;
                        $data["id_giangvien"] = ($giangvien!=null) ? $giangvien["id"] : null;
                        $data["thoigian"] = $startDate;
                        $data["buoi"] = $buoi;
                        $data["ca"] = $ca;
                        $data["so_tiet"] = (int)$so_tiet;
                        $data["tiendo"] = $tiendo;
                        $themtiet = Tiet::create($data);
                    }
                    
                   }
                }
            }
           
            catch(\Exception $e){
                $this->isValidFile = true;
           }
    }  
    
}
