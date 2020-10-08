<?php

use Illuminate\Database\Seeder;

class HocphansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hocphans')->insert([
            ['id_lop' => 1,
             'sotiet' => 60,
             'sotinchi' => 3,
             'tenhocphan' => 'ĐTHS',
            ],
        ]);
    }
}
