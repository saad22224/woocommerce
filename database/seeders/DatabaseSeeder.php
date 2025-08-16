<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Section;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 10; $i++) {
            Section::create([
                'name' => 'Section ' . $i,
                'status' => 1
            ]);
        }

        $this->call(ProductSeeder::class);
    }
}
