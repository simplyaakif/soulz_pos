<?php

    namespace Database\Factories;

    use App\Models\FoodType;
    use App\Models\Item;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class ItemFactory extends Factory {

        protected $model = Item::class;

        public function definition(): array
        {
            return [
                'title'      => $this->faker->word(),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'is_active'  => $this->faker->boolean(),

                'food_type_id' => FoodType::factory(),
            ];
        }
    }
