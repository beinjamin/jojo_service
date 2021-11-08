<?php

namespace Database\Seeders;

use App\Models\Article;
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

        $this->call(TypeArticleTableSeeder::class);
        Article::factory(100)->create();
        Client::factory(100)->create();
    }
}
