<?php

namespace App\Imports;

use App\GiangVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GiangViensImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        if (isset($row['ten'])) {
            return new GiangVien([
                'ten'     => $row['ten'],
                'chucvu'    => $row['chuc_vu'],
                'hesoluong'    => (float)$row['he_so_luong'],
                'diachi'    => $row['dia_chi'],
                'chucdanh'    => $row['chuc_danh'],
                'trinhdo'    => $row['trinh_do'],
                'cothegiang'    => (int)$row['co_the_giang'],
            ]);
        }

    }
}
