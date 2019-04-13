<?php

use Illuminate\Database\Seeder;

class AntidopingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Antidoping::class)->create([
            'descripcion' => 'No se Realizo',
        ]);
        factory(App\Antidoping::class)->create([
            'descripcion' => 'Resultado_Negativo',
        ]);
        factory(App\Antidoping::class)->create([
            'descripcion' => 'Resultado_Positivo',
        ]);
    }
}
