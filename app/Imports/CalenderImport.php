<?php

namespace App\Imports;

use App\Lop;
use App\HocPhan;
use App\Bai;
use App\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;

class CalenderImport implements ToCollection, WithHeadingRow
{

       
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
            if($row["ma_lop"]){
                if(Lop::where('malop', $row["ma_lop"])->exists()){
                    $themlop = Lop::where('malop', $row["ma_lop"])->first();
                }
                else {
                    $themlop = Lop::create([
                        'malop' => $row["ma_lop"],
                        'tenlop' => $row["ten_lop"]
                    ]);
                }
        // echo $themlop;
            if(HocPhan::where('id_lop', $themlop->id)->where('mahocphan',$row["ma_hoc_phan"])->exists()){
                $themhocphan = HocPhan::where('id_lop', $themlop->id)->where('mahocphan',$row["ma_hoc_phan"])->first();
            }
            else {
                $themhocphan = HocPhan::create([
                    'id_lop' => $themlop->id,
                    'mahocphan' => $row["ma_hoc_phan"],
                    'tenhocphan' => $row["ten_hoc_phan"],
                    'sotiet' => $row["so_tiet"],
                    'sotinchi' => $row["so_tin_chi"],
                    'start' => $row["start"],
                    'end' => $row["end"]
                ]);
            }
            // echo($themhocphan);
            //THEM BAI
            $periodbai = explode("Bài", $row["bai"]);
            for($i = 1; $i < count($periodbai); $i++){
                $bai = trim($periodbai[$i]);
                $bai = explode("có", $bai);
                $tenbai = trim($bai[0]);
                if(!Bai::where('id_hocphan',$themhocphan->id)->where('tenbai',$tenbai)->exists()){
                    $sotietbai = trim($bai[1]);
                    $thembai = Bai::create([
                    'id_hocphan' => $themhocphan->id,
                    'tenbai' => $tenbai,
                    'sotiet' => $sotietbai
                ]);
                // echo($thembai);
                }
            }
          
            // THEM TIET
            $periodtiet = explode("Từ", $row["thoi_gian"]);
            for($i = 1; $i < count($periodtiet); $i++){
                $dateRange = explode(":", $periodtiet[$i]);
                $date = explode("đến", $dateRange[0]);
                $dateFormat = DateTime::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
                $startDate = Carbon::create($dateFormat);
                $newformat = DateTime::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
                $endDate = Carbon::create($newformat);
                $dayOfWeek = explode("Thứ", $dateRange[1]);
                
                for($j = 1; $j < count($dayOfWeek); $j++){
                    $studyTime = explode(" tiết", trim($dayOfWeek[$j]));
                    $lesson = explode(" bài ", trim($studyTime[1]));
                    $startDate = Carbon::create($dateFormat);
                    for ( ; $startDate <= $endDate; $startDate->addDay()) {
                        //Thứ 7 là ngày thứ 6 trong tuần
                        if($startDate->dayOfWeek == trim($studyTime[0]) - 1){
                            $mabai = trim($lesson[1]);
                            $bai_of_tiet = Bai::where('id_hocphan', $themhocphan->id)->where('tenbai',$mabai)->first();
                            $id_bai = $bai_of_tiet->id;
                            $data["thoigian"] = $startDate;
                            $data["lesson"] = $lesson[0];
                            $data["id_lop"] = $themlop->id;
                            $data["id_hocphan"] = $themhocphan->id;
                            $data["id_bai"] = $id_bai;
                            $themtiet = Event::create($data);
                            echo($themtiet);
                        };
                    }
                   
                }
                // die();
            }
            
        }
    }
}
     
}
