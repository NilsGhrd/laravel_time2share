<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'account_id' => 1,
            'reviewer_id' => 2,
            'review_title' => 'Gemakkelijk!',
            'review_description' => 'Lenen ging erg gemakkelijk en vriendelijk.',
            'review_score' => 5,
            'created_at' => '2022-05-27',
        ]);

        DB::table('reviews')->insert([
            'account_id' => 1,
            'reviewer_id' => 2,
            'review_title' => 'Product werk niet',
            'review_description' => 'Ontving een niet werkend product.',
            'review_score' => 2,
            'created_at' => '2022-06-03',
        ]);
    }
}
