<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['front-end', 'back-end', 'Full Stack Web development', 'Graphic'];
        foreach ($categories as $value) {
            $newCategory = new Category();
            $newCategory->name = $value;
            $newCategory->slug = Str::slug($value, '-');
            $newCategory->save();
        }
    }
}
