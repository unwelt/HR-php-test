<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Status;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allOrdersList = $this->service->getOrdersList();
        $staledOrdersList = $this->service->getStaledOrdersList();
        $currentOrdersList = $this->service->getCurrentOrdersList();
        $newOrdersList = $this->service->getNewOrdersList();
        $readyOrdersList = $this->service->getReadyOrdersList();

        return view('orders.index')->with([
            'allOrdersList'     => $allOrdersList,
            'staledOrdersList'  => $staledOrdersList,
            'currentOrdersList' => $currentOrdersList,
            'newOrdersList'     => $newOrdersList,
            'readyOrdersList'   => $readyOrdersList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $partners = Partner::all();
        $statuses = Status::all();
        return view('orders.edit')->with([
            'order' => $order,
            'partners' => $partners,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder  $request
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, Order $order)
    {
        $this->service->updateOrderData($request->validated(), $order);
        return redirect()->route('order.edit', $order);
    }
}
