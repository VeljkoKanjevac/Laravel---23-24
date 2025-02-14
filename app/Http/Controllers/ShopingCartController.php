<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{

    public function index()
    {
        return view('cart', [
            'cart' => Session::get('product')
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {
        Session::push('product', [
            'product_id' => $request->get('id'),
            'amount' => $request->get('amount'),
        ]);

        return redirect()->route('cart.index');
    }
}
