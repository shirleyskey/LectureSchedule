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

    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
        $ds_lop = Lop::all();
        foreach($rows as $row){
            // THEM LOP: 
            $trunglop = false;
            $malop = $row["ma_lop"];
            foreach($ds_lop as $lop){
                if($malop == $lop->malop){
                    $trunglop = true;
                    $idloptrung = $lop->id;
                }
            }

            if($trunglop == false){
               $themlop =  Lop::create([
                    'malop' => $row["ma_lop"],
                    'tenlop' => $row["ten_lop"]
                ]);
               $themlop->save();
            }
            else {
                $themlop = Lop::findOrFail($idloptrung);
            }
           
            //THEM HOC PHAN
            $ds_hocphan = HocPhan::where('id_lop', $themlop->id );
            $mahocphan = $row["ma_hoc_phan"];
            $trunghocphan = false;
            foreach($ds_hocphan as $hocphan){
                if($mahocphan == $hocphan->mahocphan){
                    $trunghocphan = true;
                    $idhocphantrung = $hocphan->id;
                }
            }
            if($trunghocphan == false){
                $themhocphan = HocPhan::create([
                    'id_lop' => $themlop->id,
                    'mahocphan' => $mahocphan,
                    'tenhocphan' => $row["ten_hoc_phan"],
                    'sotiet' => $row["so_tiet"],
                    'sotinchi' => $row["so_tin_chi"],
                    'start' => $row["start"],
                    'end' => $row["end"]
                ]);
                $themhocphan->save();
            }
            else {
                $themhocphan = HocPhan::findOrFail($idhocphantrung);
            }

            //THEM BAI
            $periodbai = explode("Bài", $row["bai"]);
            var_dump($periodbai);
            die();
            for($i = 1; $i < count($periodbai); $i++){
                $bai = trim($periodbai[$i]);
                $bai = explode("có", $bai);
                var_dump($bai);
                die();
                $tenbai = trim($bai[0]);
                $sotietbai = trim($bai[1]);
                $thembai = Bai::create([
                    'id_hocphan' => $themhocphan->id,
                    'tenbai' => $tenbai,
                    'sotiet' => $sotietbai
                ]);
                $thembai->save();
               
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
                    $lesson = explode(" tại ", trim($studyTime[1]));
                    $startDate = Carbon::create($dateFormat);
                    for ( ; $startDate < $endDate; $startDate->addDay()) {
                        //Thứ 7 là ngày thứ 6 trong tuần
                        if($startDate->dayOfWeek == trim($studyTime[0]) - 1){
                            $data["thoigian"] = $startDate;
                            $data["lesson"] = $lesson[0];
                            $data["id_lop"] = $themlop->id;
                            $data["id_hocphan"] = $themhocphan->id;
                            $themtiet = Event::create($data);
                            $themtiet->save();
                        };
                    }
                }
            }
            
        }
    }
    

    
    public function headingRow(): int
    {
        return 1;
    }

}
