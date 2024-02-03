<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoginModel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\LoginModel::factory(10)->create();

         \App\Models\LoginModel::factory()->create([
             'Email' => 'test@example.com',
                'Senha' => 'Test User',
            
         ]);
    }
}
