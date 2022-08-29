<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodType;
use App\Models\Item;
use App\Models\ItemVariation;
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
        // \App\Models\User::factory(10)->create();

         User::create([
             'name' => 'Muhammad Aakif Raza',
             'email' => 'admin@admin.com',
             'is_admin' =>  1,
             'password' => bcrypt('password'),
         ]);

        $types = [
            [
                'title'=>'Shawarma',
            ],[
                'title'=>'Drinks',
            ],[
                'title'=>'Burgers',
            ],[
                'title'=>'Tikka',
            ],
                         ];

        foreach($types as $type){
            FoodType::create($type);
        }

        $items = [
            [
                'title'=>'Shawarma',
                'food_type_id'=>1
            ],[
                'title'=>'Shawarma Cheese',
                'food_type_id'=>1
            ],[
                'title'=>'Pepsi',
                'food_type_id'=>2
            ],[
                'title'=>'7up',
                'food_type_id'=>2
            ],[
                'title'=>'Dew',
                'food_type_id'=>2
            ],
        ];

        foreach($items as $item){
            Item::create($item);
        }

        $item_variations = [
            [
                'title'=>'Shawarma Large',
                'price'=>100,
                'item_id'=>1
            ],[
                'title'=>'Shawarma Small',
                'price'=>80,
                'item_id'=>1
            ],[
                'title'=>'Shawarma Small Cheese',
                'price'=>110,
                'item_id'=>2
            ],[
                'title'=>'Shawarma Large Cheese',
                'price'=>130,
                'item_id'=>2
            ],[
                'title'=>'Pepsi Regular',
                'price'=>40,
                'item_id'=>3
            ],[
                'title'=>'7up Regular',
                'price'=>40,
                'item_id'=>4
            ],[
                'title'=>'Dew Regular',
                'price'=>40,
                'item_id'=>5
            ],
        ];
        foreach($item_variations as $variation){
            ItemVariation::create($variation);
        }

    }
}
