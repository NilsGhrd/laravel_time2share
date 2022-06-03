<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Grasmaaier',
            'description' => 'Een mooie grasmaaier, maait erg goed zonder lawaai.',
            'category' => 'Gereedschap',
            'cost' => 5,
            'images' => json_encode(['grasmaaier1.jpg', 'grasmaaier2.jpg', 'grasmaaier3.jpg']),
            'owner_id' => 1,
            'max_borrow_days' => 2,
        ]);

        DB::table('products')->insert([
            'title' => 'Sportfiets',
            'description' => 'Sportieve fiets met 7 versnellingen en handremmen.',
            'category' => 'Vervoersmiddelen',
            'cost' => 18,
            'images' => json_encode(['fiets1.jpg', 'fiets2.jpg']),
            'owner_id' => 1,
            'max_borrow_days' => 3,
        ]);

        DB::table('products')->insert([
            'title' => 'Nintendo - NES',
            'description' => 'Leuke Nintendo Entertainment System. Inclusief 4 games en 2 controllers!',
            'category' => 'Electronica',
            'cost' => 7,
            'images' => json_encode(['nintendo1.jpg', 'nintendo2.jpg', 'nintendo3.jpg']),
            'owner_id' => 1,
            'max_borrow_days' => 8,
        ]);

        DB::table('products')->insert([
            'title' => 'Hamer',
            'description' => 'Simpele hamer van gode kwaliteit.',
            'category' => 'Gereedschap',
            'cost' => 3,
            'images' => json_encode(['hamer1.jpg', 'hamer2.jpg']),
            'owner_id' => 2,
            'max_borrow_days' => 7,
        ]);

        DB::table('products')->insert([
            'title' => 'Dumbbells rek',
            'description' => 'Grote set aan dumbbels vanaf 1kg t/m 30kg.',
            'category' => 'Sport',
            'cost' => 20,
            'images' => json_encode(['dumbbells1.jpg', 'dumbbells2.jpg']),
            'owner_id' => 2,
            'max_borrow_days' => 1,
        ]);

        DB::table('products')->insert([
            'title' => 'Robot stofzuiger',
            'description' => 'Handige robot stofzuiger, stopt vanzelf voor de muur.',
            'category' => 'Huishouden',
            'cost' => 11,
            'images' => json_encode(['stofzuiger1.jpg', 'stofzuiger2.jpg', 'stofzuiger3.jpg']),
            'owner_id' => 2,
            'max_borrow_days' => 3,
        ]);


        DB::table('products')->insert([
            'title' => 'Blender',
            'description' => 'Sterke en simpele blender.',
            'category' => 'Keuken',
            'cost' => 3,
            'images' => json_encode(['blender1.jpg', 'blender2.jpg']),
            'owner_id' => 2,
            'max_borrow_days' => 2,
        ]);
    }
}
