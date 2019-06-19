<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class create_projects_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'id' => 1,
            'title' => 'Projectenwebsite',
            'status' => 'Pending',
            'short_description' => 'Dit is de korte beschrijving',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 5,
            'creator_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'main_question' => 'Is het mogelijk de nieuwe Projectenwebsite te maken?',
            'side_questions' => 'Het maken van een degelijke site.'
        ]);
        DB::table('projects')->insert([
            'id' => 2,
            'title' => 'Varen met een boot',
            'status' => 'Accepted',
            'short_description' => 'We willen een boot doen varen',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 6,
            'creator_id' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'main_question' => 'kunnen we met een boot varen?'
        ]);
        DB::table('projects')->insert([
            'id' => 3,
            'title' => 'Gras afrijden',
            'status' => 'Accepted',
            'short_description' => 'Het gras korter maken',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 7,
            'creator_id' => 9,
            'created_at' => Carbon::parse('2019-06-20'),
            'main_question' => 'Laten we het gras groeien of rijden we het af?'
        ]);
        DB::table('projects')->insert([
            'id' => 4,
            'title' => 'Een Duvel drinken',
            'status' => 'Accepted',
            'short_description' => 'Geniet van de smaak',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 5,
            'creator_id' => 10,
            'created_at' => Carbon::parse('2018-06-20'),
            'main_question' => 'Smaakt het?'
        ]);
        DB::table('projects')->insert([
            'id' => 5,
            'title' => 'Een ei bakken',
            'status' => 'Accepted',
            'short_description' => 'Het ei breken en in de pan leggen',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 6,
            'creator_id' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'main_question' => 'Was het ei er eerder of de kip?'
        ]);
        DB::table('projects')->insert([
            'id' => 6,
            'title' => 'Capture the Flag platform',
            'status' => 'Accepted',
            'short_description' => 'Verbeteren van het huidige Capture the Flag platform',
            'full_description' => 'de labo-opdrachten binnen het vak data security (3ICT) worden vrijgegeven op een CTF (capture the flag) platform. Gebruikers (=studenten) kunnen op dit platform de uitdagingen/raadsels opvragen die we hen voorschotelen, en hun oplossingen doorsturen. Een scorebord wordt live aangepast telkens als er punten gescoord worden.

                                    We gebruiken hiervoor CTFd (https://github.com/CTFd/CTFd), maar blijven voor sommige features op onze honger zitten.

                                    Met dit project bouw je aan die ontbrekende features en ga je op zoek naar nieuwe mogelijkheden om de CTF wedstrijden (en de administratie ervan) nog krachtiger te maken, zoals:
                                    - implementeren van puntenverwerking, waarbij je bijvoorbeeld kan aangeven dat gebruikers die snel een oplossing vonden extra punten krijgen
                                    - toevoegen van een systeem waarbij je gerandomiseerde opgaves kan produceren. Elke gebruiker krijgt dan een eigen raadsel, met een eigen oplossing. Het is dan niet langer mogelijk om oplossingen door te geven.
                                    - planningsmechanisme, zodat je kan bepalen op welk moment opgaves zichtbaar worden.
                                    - ...
                                    Je hebt hierbij de keuze om CTFd verder uit te bouwen, of om een nieuw project te starten. Uiteraard moet deze keuze gemotiveerd worden.',
            'teacher_id' => 6,
            'creator_id' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'main_question' => 'Is het mogelijk om een robuust platform op te zetten?',
            'side_questions' => 'Welke technieken kunnen hiervoor gebruikt worden?
                                 Hoe zorg je ervoor dat data veilig wordt opgeborgen?
                                 Authenticatie voor student en docent voorzien?'
        ]);
    }
}
/**
Schema::create('projects', function (Blueprint $table) {
    $table->Increments('Id');
    $table->string('Title');
    $table->enum('Status', ['Declined', 'Pending', 'Accepted']);
    $table->mediumText('Short_Description');
    $table->longText('Full_Description');
    $table->integer('Teacher_Id');
    $table->integer('Creator_Id');
    $table->timestamps();
});
*/
