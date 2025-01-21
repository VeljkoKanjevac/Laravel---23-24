<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {

        $products = ProductsModel::orderByDesc("id") -> take(6) -> get();

        $hour = date('H');

        $currentTime = date("H:i:s");

        return view('welcome', compact('currentTime', 'hour', 'products'));
    }
}
