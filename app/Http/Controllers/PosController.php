<?php

    namespace App\Http\Controllers;

    use App\Models\FoodType;
    use App\Models\Item;
    use Inertia\Inertia;

    class PosController extends Controller {

        public function index()
        {
            return Inertia::render('POS/counter', [
                'items' => Item::with('food_type')->where('is_active',1)->get(),
                'food_types'=>FoodType::all(),
            ]);
        }

        public function generateOrder()
        {

        }
    }
