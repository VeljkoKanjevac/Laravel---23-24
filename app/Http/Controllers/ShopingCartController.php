<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{

    public function index()
    {
        $cart = Session::get('product');
        if(count($cart) < 1)
        {
            return redirect('/');
        }

        $combined = [];
        foreach ($cart as $cartItem)
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

    public function orderFinish()
    {
        $cart = Session::get('product');
        $totalCartPrice = 0;

        foreach ($cart as $item)
        {
            $product = ProductsModel::firstWhere(['id' => $item["product_id"]]);
            if ($item["amount"] > $product->amount)
            {
                return redirect()->back();
            }
            $totalCartPrice += $product->price * $item["amount"];
        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice,
        ]);

        foreach ($cart as $item)
        {
            $product = ProductsModel::firstWhere(['id' => $item["product_id"]]);
            $product->amount -= $item["amount"];
            $product->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item["amount"],
                'price' => $product->price * $item["amount"],
            ]);
        }

        Session::remove('product');
        return view('thankyou');
    }
}
