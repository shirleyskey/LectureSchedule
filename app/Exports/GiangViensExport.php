<?php

namespace App\Exports;

use App\GiangVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GiangViensExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings() :array {
    	return ["STT", "Tên tài khoản", "Email", "Loại"];
    }

    public function collection()
    {
        return GiangVien::all();
    }
}
