<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\TeamCategory;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = TeamCategory::all();

        // Create teams and associate with categories
        $team1 = Team::create([
            'name' => 'John Doe',
            'slug' => 'john-doe',
            'designation' => 'CEO',
            'description' => 'Leader of the company',
            'company_id' => 1
        ]);
        $team1->categories()->attach($categories->where('slug', 'founders-desk')->pluck('id'));

        $team2 = Team::create([
            'name' => 'Jane Smith',
            'slug' => 'jane-smith',
            'designation' => 'CTO',
            'description' => 'In charge of technology',
            'company_id' => 1
        ]);
        $team2->categories()->attach($categories->where('slug', 'leadership')->pluck('id'));
    }
}
