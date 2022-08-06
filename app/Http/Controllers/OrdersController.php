<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class OrdersController extends Controller {

        public function index()
        {
            //
        }

        public function create()
        {
            //
        }

        public function store(Request $request)
        {
            $order_data = $request->validate([
                                                 'total_amount'    => 'required',
                                                 'discount_amount' => 'required',
                                                 'tax_amount'      => 'required',
                                                 'subtotal_amount' => 'required',
                                                 'paid_in'     => 'required',
                                                 'items_count'     => 'required',
                                             ]);
            $order_data['user_id']=Auth::id();
            $order_items_id = collect($request->input('cart'))->pluck('item.id');

            $order = Order::create($order_data);
            $order->items()->attach($order_items_id);
            dd($order->load('items'));
        }

        public function show(Order $order)
        {
            //
        }

        public function edit(Order $order)
        {
            //
        }

        public function update(Request $request, Order $order)
        {
            //
        }

        public function destroy(Order $order)
        {
            //
        }
    }
