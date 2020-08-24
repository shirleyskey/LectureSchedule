<?php

namespace App\Imports;

use App\Models\Lop;
use App\Models\HocPhan;
use App\Models\Event;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use DateTime;

class CalenderImport implements ToCollection, ToModel
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] > 0){
            $period = explode("Từ", $row[7]);

            for($i = 1; $i < count($period); $i++) {
                $dateRange = explode(":", $period[$i]);
                    $date = explode(" đến ", $dateRange[0]);
                    $dateFormat = DateTime::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
                    $startDate = Carbon::create($dateFormat);
                    $newformat = DateTime::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
                    $endDate = Carbon::create($newformat);
                    $dayOfWeek = explode("Thứ", $dateRange[1]);

                    for ($j=1; $j < count($dayOfWeek); $j++) {
                        $studyTime = explode(" tiết ", trim($dayOfWeek[$j]));
                        $lesson = explode(" tại ", trim($studyTime[1]));
                        $startDate = Carbon::create($dateFormat);

                        for ( ; $startDate < $endDate; $startDate->addDay()) {
                            if($startDate->dayOfWeek == trim($studyTime[0]) - 1){
                                $data["date"] = $startDate;
                                $data["class"] = $row[5];
                                $data["lesson"] = $lesson[0];
                                $data["room"] = "N/A";
                                if (isset($lesson[1])) {
                                    $data["room"] = $lesson[1];
                                }

                                $user = Schedule::create($data);
                            };
                        }
                    }
                }
            }

        return true;
    }


}
