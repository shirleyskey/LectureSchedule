<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 1;
    }

    public function model(array $row)
    {
        return new User([
            //
            'name' => $row['name'] ?? $row['ten_tai_khoan'],
            'email' => $row['email'],
            'password' => Hash::make($row['password'] ?? $row['mat_khau'])
           
        ]);
    }
}
