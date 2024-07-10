<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Factory as Faker;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Lista di nomi di aziende ferroviarie comuni
        $aziende = [
            'Trenitalia', 'Italo', 'Trenord', 'Frecciarossa', 'Frecciargento', 
            'Nordest', 'Siciliana Trasporti', 'Toscana Railways', 'Lombardia Express', 'Alpina Rail'
        ];

        // Lista delle città escluse
        $excludedCities = ['Roma', 'Napoli', 'Milano', 'Venezia', 'Firenze'];

        // Creazione dei primi 45 treni senza restrizioni
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

        // Creazione di 5 treni con città di partenza e arrivo diverse da Roma, Napoli, Milano, Venezia e Firenze
        for ($i = 0; $i < 5; $i++) {
            // Genera una stazione di partenza non presente nelle città escluse
            $stazioneDiPartenza = $faker->city;
            while (in_array($stazioneDiPartenza, $excludedCities)) {
                $stazioneDiPartenza = $faker->city;
            }

            // Genera una stazione di arrivo non presente nelle città escluse e diversa dalla stazione di partenza
            $stazioneDiArrivo = $faker->city;
            while (in_array($stazioneDiArrivo, $excludedCities) || $stazioneDiArrivo == $stazioneDiPartenza) {
                $stazioneDiArrivo = $faker->city;
            }

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
