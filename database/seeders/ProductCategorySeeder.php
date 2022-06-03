<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Electronica', 'Gereedschap', 'Huishouden', 'Keuken',  'Sport', 'Vervoersmiddelen'];

        foreach($categories as $category) {
            DB::table('product_categories')->insert([
                'category' => $category
            ]);
        }
    }
}
