<?php

    namespace Database\Factories;

    use App\Models\Item;
    use App\Models\ItemVariation;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class ItemVariationFactory extends Factory {

        protected $model = ItemVariation::class;

        public function definition(): array
        {
            return [
                'title'             => $this->faker->word(),
                'price'             => $this->faker->randomNumber(3),
                'short_description' => $this->faker->text(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),

                'item_id' => Item::factory(),
            ];
        }
    }
