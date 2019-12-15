<?php

namespace Tests\Feature;

use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrdersPage()
    {
        $response = $this->get(route('orders.index'));
        $response->assertStatus(200);
    }

    public function testOrderEditPage()
    {
        $orderToTest = Order::first();
        $response = $this->get(route('order.edit', $orderToTest));
        $response->assertStatus(200);
    }
}
