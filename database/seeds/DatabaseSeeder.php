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
        Eloquent::unguard();
        $categories = 'database/seeds/categories.sql';
        DB::unprepared(file_get_contents($categories));
        $this->command->info('categories table seeded!');


        // $this->call(UsersTableSeeder::class);
    }
}
