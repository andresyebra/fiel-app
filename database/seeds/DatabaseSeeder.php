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
//         $this->call(UsersTableSeeder::class);
//         $this->call(EmployeesSeeder::class);
         $this->call(AreasSeeder::class);
         $this->call(CompaniesSeeder::class);
         $this->call(ResignationsSeeder::class);
         $this->call(LicenceSeeder::class);
         $this->call(AntidopingSeeder::class);

    }
}
