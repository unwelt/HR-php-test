<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Services\ProductService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductServiceTest extends TestCase
{
    /**
     * @var ProductService
     */
    public $service;

    protected function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make('App\Services\ProductService');
    }

    public function testGetAllProductsList()
    {
        $result = $this->service->getAllProductsList();
        $this->assertCount(25, $result);
    }

    public function testProductUpdate()
    {
        $product = Product::first();

        $data = [
            'price' => ($product->price + 100),
        ];

        $result = $this->service->updateProduct($data, $product);
        $this->assertTrue($result);
        $this->assertEquals($data['price'], $product->price);
    }
}
