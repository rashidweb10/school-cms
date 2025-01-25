<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 1,
            'company_id' => null,
            'password' => bcrypt('test@example.com'),
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'role_id' => 2,
            'company_id' => 1,
            'password' => bcrypt('test2@example.com'),
        ]);   
        
        User::factory()->create([
            'name' => 'Test User 3',
            'email' => 'test3@example.com',
            'role_id' => 2,
            'company_id' => 2,
            'password' => bcrypt('test3@example.com'),
        ]);         

        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            TeamCategoriesSeeder::class,
            TeamsSeeder::class,
            CampusSeeder::class,
            GallerySeeder::class,
        ]);        
    }
}
