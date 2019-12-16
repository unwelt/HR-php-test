<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * @var Product
     */
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Метод возвращающий список продуктов с постраничной разбивкой
     * @return mixed
     */
    public function getAllProductsList()
    {
        $products = $this->model->orderBy('name', 'asc')->paginate(25);
        return $products;
    }

    /**
     * Метод для сохранения изменений продукта
     *
     * @param  array  $data
     * @param  Product  $product
     *
     * @return bool
     */
    public function updateProduct(array $data, Product $product)
    {
        return $product->update($data);
    }
}
