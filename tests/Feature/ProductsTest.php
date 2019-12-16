<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use DatabaseTransactions;

    public function testProductsPage()
    {
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
    }
}
