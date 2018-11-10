<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class)->create([
            'clave' =>'1234',
            'descripcion' => 'Software & Development Inc.',
            'area' => '112',
        ]);

        factory(App\Company::class)->create([
            'clave' =>'1235',
            'descripcion' => 'Agricultura Mexicali',
            'area' => '222',
        ]);

        factory(App\Company::class)->create([
            'clave' =>'1235',
            'descripcion' => 'Cuidado de Ganado Company',
            'area' => '111',
        ]);
    }
}
