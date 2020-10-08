<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NckhsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nckhs')->insert([
            ['id_giangvien' => 1,
             'ten' => 'NCKH 01',
             'tiendo' => 4,
             'thoigian' => Carbon::create('2000', '01', '01')
            
            ],
            ['id_giangvien' => 2,
            'ten' => 'NCKH 02',
            'tiendo' => 2,
            'thoigian' => Carbon::create('2000', '01', '01')
           
           ],
            
            
        ]);

    }
}
