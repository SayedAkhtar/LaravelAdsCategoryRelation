<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ads;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Ads::factory(5)->create();
        Category::factory(3)->create()->each(function($category){
            Category::factory(random_int(1, 4))->create(['parent_id' => $category->id]);
        });
        $category = Category::all();
        Ads::all()->each(function ($ad) use($category){
            $ad->category()->attach($category->random());
        });
    }
}
