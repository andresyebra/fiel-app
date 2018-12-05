<?php

use Illuminate\Database\Seeder;

class ResignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Resignation::class)->create([
            'descripcion' => 'Renuncia Voluntaria',
        ]);
        factory(App\Resignation::class)->create([
            'descripcion' => 'Liquidacion',
        ]);
        factory(App\Resignation::class)->create([
            'descripcion' => 'Demanda',
        ]);

    }
}
