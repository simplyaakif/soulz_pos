<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class OrdersController extends Controller {


        public function store(Request $request)
        {
            $order_data = $request->validate([
                                                 'total_amount'    => 'required',
                                                 'discount_amount' => 'required',
                                                 'tax_amount'      => 'required',
                                                 'subtotal_amount' => 'required',
                                                 'paid_in'     => 'required',
                                                 'items_count'     => 'required',
                                                 'cart_items'=>'required|array|min:1'
                                             ]);
            $order_data['cart_items']=$request->input('cart_items');
            $order_data['user_id']=Auth::id();
            $order = Order::create($order_data);

        }


    }
