<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->image = $project['image'];
            $newProject->title = $project['title'];
            $newProject->body = $project['body'];
            $newProject->link = $project['link'];
            $newProject->user_id = 1;
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->save();
        }
    }
}
