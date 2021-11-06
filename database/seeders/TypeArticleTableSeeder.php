<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_articles')->insert([
            ["nom" => "voiture"],
            ["nom" => "Immobilier"],
            ["nom" => "Appareil Electroniques"],
            ["nom" => "Salle"],

        ]);
    }
}
