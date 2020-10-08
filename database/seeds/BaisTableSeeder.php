<?php

use Illuminate\Database\Seeder;

class BaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bais')->insert([
            ['id_lop' => 1,
             'id_hocphan' => 2,
             'sotiet' => 4,
             'tenbai' => 'Bài 1 - Học phần 2',
            ],
            ['id_lop' => 2,
            'id_hocphan' => 3,
            'sotiet' => 9,
            'tenbai' => 'Bài 2 - Học phần 3',
           ]
            
        ]);
    }
}
