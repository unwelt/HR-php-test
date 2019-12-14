<?php


namespace App\Services;


use App\Models\Order;

class OrderService
{
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Метод возвращающий список заказов
     * @return array
     */
    public function getOrdersList()
    {   $orders = [];
        $orders = $this->model->paginate(25);
        return $orders;
    }
}