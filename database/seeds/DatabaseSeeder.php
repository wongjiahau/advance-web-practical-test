<?php

use Illuminate\Database\Seeder;
use App\Party;
use App\Candidate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // copied from https://stackoverflow.com/questions/20546253/how-to-reset-auto-increment-in-laravel-user-deletion
        // truncate is needed so that the autoincrement id counter will be reset to zero
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(PartyTableSeeder::class);
        $this->call(CandidateTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

class PartyTableSeeder extends Seeder
{
    public function run()
    { 
        DB::table('parties')->truncate();
        foreach(['Parti Ayam', 'Parti Itik', 'Parti Kucing'] as $party) {
            Party::create(['name' => $party]);
        }
    }
}

class CandidateTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('candidates')->truncate();
        Candidate::create(['name' => 'Abu Bakar Muhammad', 'party_id' => 3]);
        Candidate::create(['name' => 'Ng Pei Li'         , 'party_id' => 3]);
        Candidate::create(['name' => 'Ranjit Singh Deo'  , 'party_id' => 3]);
        Candidate::create(['name' => 'Foo Yoke Wei'      , 'party_id' => 1]);
        Candidate::create(['name' => 'Chia Kim Hooi'     , 'party_id' => 2]);
    }
}
