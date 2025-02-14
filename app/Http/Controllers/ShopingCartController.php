<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{

    public function index()
    {
        $allProducts = [];

        foreach(Session::get('product') as $cartItem)
        {
            $allProducts[] = $cartItem['product_id'];
        }

        $products = ProductsModel::whereIn("id", $allProducts)->get();

        return view('cart', [
            'cart' => Session::get('product'),
            'products' => $products,
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::where(['id' => $request->id])->first();

        if($product->amount < $request->amount)
        {
            return redirect()->back();
        }

        Session::push('product', [
            'product_id' => $request->get('id'),
            'amount' => $request->get('amount'),
        ]);

        return redirect()->route('cart.index');
    }
}
