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
            return Inertia::render('POS/Order', [
            'items' => $items,
            'food_types'=>FoodType::has('items','>',0)->get(),
            ]);
        }

        public function history()
        {
            return Inertia::render('POS/OrderHistory',[
                'orders'=>Order::whereDate('created_at',now()->toDateString())->get(),
            ]);
        }

        public function bestSellers()
        {
            $orders = Order::whereDate('created_at',now()->subDays(7)->toDateString());
            return Inertia::render('POS/BestSellers',[
                'orders'=>Order::all()
            ]);
        }

    }
