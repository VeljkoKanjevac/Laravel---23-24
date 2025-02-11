<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }
}
