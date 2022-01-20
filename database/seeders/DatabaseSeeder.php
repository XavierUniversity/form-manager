<?php

namespace Database\Seeders;

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
        // Run the base user first
        $this->call([UserSeeder::class]);
        // Let's create some additional users and forms
        \App\Models\User::factory(10)->create();
        \App\Models\Form::factory(30)->create();
    }
}
