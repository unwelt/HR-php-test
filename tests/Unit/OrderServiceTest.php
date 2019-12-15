<?php

namespace Tests\Unit;

use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var OrderService
     */
    private $service;

    protected function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make('App\Services\OrderService');
    }

    public function testOrdersList()
    {
        $result = $this->service->getOrdersList();
        $this->assertEquals(25, count($result));
    }

    public function testGetStaledOrdersList()
    {
        $result = $this->service->getStaledOrdersList();
        $this->assertNotEquals(0, count($result));
    }

    public function testGetCurrentOrdersList()
    {
        $result = $this->service->getCurrentOrdersList();
        $this->assertNotEquals(0, count($result));
    }

    public function testGetNewOrdersList()
    {
        $result = $this->service->getNewOrdersList();
        $this->assertNotEquals(0, count($result));
    }

    public function testGetRedyOrdersList()
    {
        $result = $this->service->getReadyOrdersList();
        $this->assertNotEquals(0, count($result));
    }

    public function testOrderUpdate()
    {

        $orderToTest = Order::first();
        $paramsToUpdate = [
            'client_email' => 'test@test.com',
            'status_id'    => $orderToTest->status_id,
            'partner_id'   => $orderToTest->partner_id,
        ];


        $this->assertNotEquals($paramsToUpdate['client_email'], $orderToTest->client_email);
        $result = $this->service->updateOrderData($paramsToUpdate, $orderToTest);
        $this->assertTrue($result);
        $this->assertEquals($paramsToUpdate['client_email'], $orderToTest->client_email);
    }
}
