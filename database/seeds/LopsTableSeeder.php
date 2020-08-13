<?php

use Illuminate\Database\Seeder;

class LopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lops')->insert([
            ['tenlop' => 'B14D48 - ATTT',
             'quymo' => 'C',
             'songuoi' => 20],
             ['tenlop' => 'B11D49 - CLC',
             'quymo' => 'B',
             'songuoi' => 30],
             ['tenlop' => 'B1D50 - ANĐT',
             'quymo' => 'A',
             'songuoi' => 50],
             ['tenlop' => 'B3LT11 - QLNN',
             'quymo' => 'A',
             'songuoi' => 100],
           
        ]);
    }
}
