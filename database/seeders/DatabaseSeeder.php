<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CountryTableSeeder;
use Database\Seeders\UserTableSeeder; 

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CountryTableSeeder::class);
        // $this->call([
        //     UserTableSeeder::class
        // ]); 
    }
}
