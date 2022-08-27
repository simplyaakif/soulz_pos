<?php

    namespace App\Http\Controllers;

    use App\Models\FoodType;
    use App\Models\Item;
    use App\Models\Order;
    use Inertia\Inertia;

    class PosController extends Controller {

        public function index()
        {
            $items = Item::with('food_type','item_variations')
                ->has('item_variations','>',0)
                ->where('is_active', 1)->get();
//            dd($items);
            return Inertia::render('POS/counter', [
            'items' => $items,
            'food_types'=>FoodType::has('items','>',0)->get(),
            ]);
        }

        public function history()
        {
            return Inertia::render('POS/history',[
                'orders'=>Order::all()
            ]);
        }

        public function bestSellers()
        {
            return Inertia::render('POS/bestSellers',[
                'orders'=>Order::all()
            ]);
        }

    }
