<?php

use App\Voiture;
use Illuminate\Database\Seeder;

class VoitureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Voiture::class, 30)->create();

    }
}
