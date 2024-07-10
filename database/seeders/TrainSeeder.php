<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Factory as Faker;

class TrainSeeder extends Seeder
{
    /**
     * 
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Lista di nomi di aziende ferroviarie
        $aziende = [
            'Trenitalia', 'Italo', 'Trenord', 'Frecciarossa', 'Frecciargento', 
            'Nordest', 'Siciliana Trasporti', 'Toscana Railways', 'Lombardia Express', 'Alpina Rail'
        ];

        // Creazione dei 45 treni
        for ($i = 0; $i < 45; $i++) {
            Train::create([
                'azienda' => $faker->randomElement($aziende),
                'stazione_di_partenza' => $faker->city,
                'stazione_di_arrivo' => $faker->city,
                'orario_di_partenza' => $faker->time,
                'orario_di_arrivo' => $faker->time,
                'codice_treno' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
                'numero_carrozze' => $faker->numberBetween(5, 20),
                'in_orario' => $faker->boolean,
                'cancellato' => $faker->boolean,
            ]);
        }

        // Creazione di 5 treni con città di partenza e arrivo specifiche
        for ($i = 0; $i < 5; $i++) {
            // Genera una stazione di partenza e arrivo 
            $stazioneDiPartenza = $faker->unique()->city;
            $stazioneDiArrivo = $faker->unique()->city;

            Train::create([
                'azienda' => $faker->randomElement($aziende),
                'stazione_di_partenza' => $stazioneDiPartenza,
                'stazione_di_arrivo' => $stazioneDiArrivo,
                'orario_di_partenza' => $faker->time,
                'orario_di_arrivo' => $faker->time,
                'codice_treno' => $faker->regexify('[A-Z]{2}[0-9]{3}'),
                'numero_carrozze' => $faker->numberBetween(5, 20),
                'in_orario' => $faker->boolean,
                'cancellato' => $faker->boolean,
            ]);
        }
    }
}
