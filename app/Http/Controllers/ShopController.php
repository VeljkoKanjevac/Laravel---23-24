<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
       $allProducts = ProductsModel::all();

       return view('shop', compact('allProducts'));
    }

}
