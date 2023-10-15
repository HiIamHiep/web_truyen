<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Chapter_detail;
use App\Models\ChapterDetail;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(500)->create();
         Author::factory(10000)->create();
         Category::factory(30)->create();
         Comic::factory(1000)->create();
         Chapter::factory(1000)->create();
         ChapterDetail::factory(10000)->create();
    }
}
