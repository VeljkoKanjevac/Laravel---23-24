<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function saveProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:products',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
            'image' => 'required|string'
        ]);

        $this->productRepo->createNew($request);

        return redirect()->route('allProducts');
    }

    public function getAllProducts()
    {
        $allProducts = ProductsModel::all();

        return view('allProducts', compact('allProducts'));
    }

    public function deleteProduct($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);

        if($singleProduct === null)
        {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function getProductById(ProductsModel $product)
    {
        return view('updateProduct', compact('product'));
    }

    public function updateProduct(Request $request,ProductsModel $product)
    {
        $request->validate([
            'name' => 'required|string|min:3|unique:products',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
            'image' => 'required|string'
        ]);

        $this->productRepo->edit($product, $request);

        return redirect()->route('allProducts');
    }
}
