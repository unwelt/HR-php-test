<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    private $service;

    protected function setUp()
    {
        parent::setUp();
        $this->service = $this->app->make('App\Services\OrderService');
    }

    public function testOrdersList()
    {
        $result = $this->service->getOrdersList();
        $this->assertTrue(count($result) === 25);
    }
}
