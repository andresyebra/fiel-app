<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Area::class)->create([
            'clave' =>'112',
            'descripcion' => 'Tecnologica',
        ]);

        factory(App\Area::class)->create([
            'clave' =>'222',
            'descripcion' => 'Agricultura',
        ]);

        factory(App\Area::class)->create([
            'clave' =>'111',
            'descripcion' => 'Ganadera',
        ]);
    }
}
