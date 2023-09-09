<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    const PAGINATE_NUMBER = 10;
    
    public function index()
    {
        $orders = Order::paginate(self::PAGINATE_NUMBER);
        return view('orders', compact('orders'));
    }

    public function filter(Request $request)
    {
        $users = User::where('first_name', $request->get('name'))->orWhere('last_name', $request->get('name'))->get();

        $orders = [];

        foreach($users as $user) {
            $order = Order::where("purchaser_id", $user->id)->first();

            $orders[] = $order;
        }
        return view('orders', compact('orders'));
    }
}
