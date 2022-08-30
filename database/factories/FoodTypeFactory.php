<?php

    namespace Database\Factories;

    use App\Models\FoodType;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class FoodTypeFactory extends Factory {
        protected $model = FoodType::class;

        public function definition(): array
        {
            return [
                'title'      => $this->faker->word(),

                'short'      => $this->faker->word(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
    }
