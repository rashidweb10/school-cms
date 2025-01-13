<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamCategory;

class TeamCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamCategory::create(['slug' => 'founders-desk', 'name' => "Founder's Desk"]);
        TeamCategory::create(['slug' => 'presidents-desk', 'name' => "President's Desk"]);
        TeamCategory::create(['slug' => 'principals-desk', 'name' => "Principal's Desk"]);
        TeamCategory::create(['slug' => 'leadership', 'name' => "Leadership"]);
        TeamCategory::create(['slug' => 'our-team', 'name' => "Our Team"]);
        TeamCategory::create(['slug' => 'management', 'name' => "Management"]);
        TeamCategory::create(['slug' => 'others', 'name' => "Others"]);
    }
}
