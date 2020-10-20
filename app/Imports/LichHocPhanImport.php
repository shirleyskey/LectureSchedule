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

    public function __construct($id) {
        $this->id_hocphan = $id;
        }

    public function headingRow(): int
    {
        return 1;
    }

    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
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
                $giangvien = GiangVien::where('ma_giangvien', $ma_giangvien)->first();

                //Get Thoi Gian Sáng or Chiều
                $buoi = $row["thoi_gian"][0];
                $ca = $row["thoi_gian"][2];

                $ngay = explode(",", $row["thoi_gian"]);
                
                $dateFormat = DateTime::createFromFormat('d/m/Y', trim($ngay[1]))->format('Y-m-d');
                $startDate = Carbon::create($dateFormat);
                // dd($startDate);
                $data["id_lop"] = $lop->id_lop;
                $data["id_hocphan"] = $this->id_hocphan;
                $data["id_bai"] = $them_bai->id;
                $data["id_giangvien"] = $giangvien["id"];
              
                $data["thoigian"] = $startDate;
                $data["buoi"] = $buoi;
                $data["ca"] = $ca;
                $themtiet = Tiet::create($data);
               

            }
        }
           
    }      
}
