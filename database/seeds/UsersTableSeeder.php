<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' =>'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        factory(App\User::class, 5)->create();
    }
}
