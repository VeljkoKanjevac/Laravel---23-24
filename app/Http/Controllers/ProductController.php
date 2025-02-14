<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
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

    public function permalink(ProductsModel $product)
    {
        return view('products.permalink', compact('product'));
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);

        return redirect()->route('product.all');
    }

    public function getAllProducts()
    {
        $allProducts = ProductsModel::all();

        return view('products.all', compact('allProducts'));
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
        return view('products.update', compact('product'));
    }

    public function updateProduct(SaveProductRequest $request,ProductsModel $product)
    {
        $this->productRepo->edit($product, $request);

        return redirect()->route('product.all');
    }
}
