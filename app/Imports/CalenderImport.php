<?php

namespace App\Imports;

use App\Lop;
use App\HocPhan;
use App\Bai;
use App\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use DateTime;

class CalenderImport implements ToCollection, ToModel
{

    public function headingRow(): int
    {
        return 2;
    }

    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
         /* 1. Lấy Mã Lớp. 
                    + Dùng vòng lặp để kiểm tra trong database mã lớp
                    + Nếu có mã lớp trùng thì k insert mà lấy ra ID lớp 
                    + 
               2. Lấy mã Học Phần
                    + Dùng vòng lặp để kiểm tra ID lớp đó có mã học phần nào chưa
                    + Nếu có thì lấy ID của học phần đó
                    + Nếu không thì insert và lấy ID học phần
                    + 
               3. Lấy tên bài và số tiết để insert vào database
               4. Lấy tên tiết và thời gian để insert vào database

        */
        $ds_lop = Lop::all();
        foreach($rows as $row){
            // THEM LOP: 
            $trunglop = false;
            $malop = $row[1];
            foreach($ds_lop as $lop){
                if($malop == $lop->malop){
                    $trunglop = true;
                    $idloptrung = $lop->id;
                }
            }
            if($trunglop == false){
               $themlop =  Lop::create([
                    'malop' => $row[1],
                    'tenlop' => $row[2]
                ]);
               $themlop->save();
            }
            else {
                $themlop = Lop::findOrFail($idloptrung);
            }

            //THEM HOC PHAN
            $ds_hocphan = HocPhan::where('id_lop', $themlop->id );
            $mahocphan = $row[3];
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
                    'tenhocphan' => $row[4],
                    'sotiet' => $row[5],
                    'sotinchi' => $row[6],
                    'start' => $row[7],
                    'end' => $row[8]
                ]);
                $themhocphan->save();
            }
            else {
                $themhocphan = HocPhan::findOrFail($idhocphantrung);
            }

            //THEM BAI
            $periodbai = explode("Bài", $row[9]);
            for($i = 0; $i < count($periodbai); $i++){
                $bai = trim($periodbai[$i]);
                $bai = explode("có", $bai);
                $tenbai = trim($bai[0]);
                $sotietbai = (int)(trim($bai[1]));
                $thembai = Bai::create([
                    'id_hocphan' => $themhocphan->id,
                    'tenbai' => $tenbai,
                    'sotiet' => $sotietbai
                ]);
                $thembai->save();
               
            }
            // THEM TIET
            $periodtiet = explode("Từ", $row[10]);
            for($i = 0; $i < count($periodtiet); $i++){
                $dateRange = explode(":", $periodtiet[$i]);
                $date = explode("đến", $dateRange[0]);
                $dateFormat = DateTime::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
                $startDate = Carbon::create($dateFormat);
                $newformat = DateTime::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
                $endDate = Carbon::create($newformat);
                $dayOfWeek = explode("Thứ", $dateRange[1]);
                
                for($j = 0; j < count($dayOfWeek); $j++){
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
}
