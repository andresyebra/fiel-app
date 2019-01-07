<?php

use Illuminate\Database\Seeder;

class LicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Licence::class)->create([
            'licencia' => '18A01A18',
            'fecha_inicial' => '2019-01-01',
            'fecha_final' => '2019-12-31',
            'tipo' => 'A',
            'empresa' => null,
            'observacion' => '01',
        ]);
        factory(App\Licence::class)->create([
            'licencia' => '18A01A36',
            'fecha_inicial' => '2019-01-01',
            'fecha_final' => '2019-12-31',
            'tipo' => 'A',
            'empresa' => null,
            'observacion' => '01',
        ]);
        factory(App\Licence::class)->create([
            'licencia' => '18A01A27',
            'fecha_inicial' => '209-01-01',
            'fecha_final' => '2019-12-31',
            'tipo' => 'A',
            'empresa' => null,
            'observacion' => '01',
        ]);
    }
}
