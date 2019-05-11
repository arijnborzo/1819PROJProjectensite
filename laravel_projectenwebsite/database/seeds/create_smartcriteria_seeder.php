<?php

use Illuminate\Database\Seeder;

class create_smartcriteria_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('smartcriteria')->insert([
            'group_id' => 1,
            'specific' => 'Vernieuwen van de huidige site',
            'measurable' => 'De website moet de leerlingen van het 2e jaar tegelijk op de website toelaten',
            'acceptable' => 'De website moet volledig werkende zijn',
            'realistic' => 'Website moet moderne methodes gebruiken',
            'tolerant' => 'Groepen moeten kunnen worden verdeeld',
        ]);
        DB::table('smartcriteria')->insert([
            'group_id' => 2,
            'specific' => 'Boot maken',
            'measurable' => 'Niet zinken',
            'acceptable' => 'Varen jeh',
            'realistic' => 'Goeide materialen gebruiken',
            'tolerant' => 'Met roeispanen',
        ]);
        DB::table('smartcriteria')->insert([
            'group_id' => 3,
            'specific' => 'Gras korter maaien',
            'measurable' => 'De lengte van het gras meten',
            'acceptable' => 'Gras moet overal even lang zijn',
            'realistic' => 'Er moet een moderen grasmaaier gebruikt worden',
            'tolerant' => 'Het gemaaid gras moet verwerkt worden door de machine',
        ]);
        DB::table('smartcriteria')->insert([
            'group_id' => 4,
            'specific' => 'Een Duvel uitgieten en opdrinken',
            'measurable' => 'Tot de Duvel op is',
            'acceptable' => 'Het moet netjes uitgegegoten worden',
            'realistic' => 'Er wordt gebruik gemaakt van en licht bevochtigd glas',
            'tolerant' => 'Als hij op is kan er een nieuwe besteld worden',
        ]);
        DB::table('smartcriteria')->insert([
            'group_id' => 5,
            'specific' => 'Een ei bakken',
            'measurable' => 'Het ei moet lekker zijn',
            'acceptable' => 'Er mag geen eierschaal in de bereiding zitten',
            'realistic' => 'Er mag niets aangebakken zijn',
            'tolerant' => 'Evenueel een beetje kruiden',
        ]);
    }
}
