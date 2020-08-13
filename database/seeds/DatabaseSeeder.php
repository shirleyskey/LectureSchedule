<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BaisTableSeeder::class);
        $this->call(HocphansTableSeeder::class);
        $this->call(LopsTableSeeder::class);
        $this->call(NckhsTableSeeder::class);
        $this->call(TietsTableSeeder::class);
    }
}
