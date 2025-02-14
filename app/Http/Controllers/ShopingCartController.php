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
        $cartItems = Session::get('product');
        $productIDs = array_column(Session::get('product'), "product_id");
        $products = ProductsModel::whereIn("id", $productIDs)->get();

        $combined = [];

        foreach ($cartItems as $cartItem)
        {
            $product = ProductsModel::firstWhere('id', $cartItem["product_id"]);
            if ($product)
            {
                $combined[] = [
                    "name" => $product->name,
                    'amount' => $cartItem["amount"],
                    "price" => $product->price,
                    "totalPrice" => $product->price * $cartItem["amount"],
                ];
            }
        }

        return view('cart', compact('combined'));
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
