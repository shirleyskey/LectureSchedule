<?php

namespace App\Imports;

use App\Lop;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LopImport implements ToCollection , WithHeadingRow

{
    public function headingRow(): int
    {
        return 1;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            echo($row);
            die();
            // Lop::create([
            //     'malop' => $row[1],
            //     'tenlop' => $row[2]
            // ]);
        }
    }
   
}
