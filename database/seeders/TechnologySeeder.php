<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('technologies.key');

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->icon = $technology['icon'];
            $new_technology->slug = Str::slug($technology['name'], '-');
            $new_technology->save();
        }
    }
}
