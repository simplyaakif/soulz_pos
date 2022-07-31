<?php

    namespace Database\Factories;

    use App\Models\Item;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class ItemFactory extends Factory {

        protected $model = Item::class;

        public function definition(): array
        {
            return [
                'title'=> $this->faker->words(3,true),
                'price'=>$this->faker->randomNumber(3)

            ];
        }
    }
