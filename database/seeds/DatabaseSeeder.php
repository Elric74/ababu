<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(LocalesTableSeeder::class);
        $this->call(ClinicsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LivesTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
        $this->call(SpeciesTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        $this->call(DiagnosesTableSeeder::class);
        $this->call(MedicinesTableSeeder::class);
        $this->call(ProblemsTableSeeder::class);
        $this->call(PrescriptionsTableSeeder::class);
    }
}
