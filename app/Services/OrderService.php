<?php


namespace App\Services;


use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @var Order
     */
    private $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Метод возвращающий список заказов
     *
     * @return array
     */
    public function getOrdersList()
    {
        $orders = $this->model->with('partner', 'products', 'status')
            ->paginate(25);
        return $orders;
    }

    /**
     * Метод возвращающий список просроченных заказов
     *
     * @return mixed
     */
    public function getStaledOrdersList()
    {
        $orders = $this->model->with('partner', 'products', 'status')
            ->where('delivery_dt', '<', Carbon::now())
            ->whereHas('status', function ($q) {
                $q->accepted();
            })
            ->orderBy('delivery_dt', 'desc')->limit(50)->get();

        return $orders;
    }

    /**
     * Метод возврщающий список текущих заказов
     *
     * @return mixed
     */
    public function getCurrentOrdersList()
    {
        $startDateTime = Carbon::now();
        $endDateTime = Carbon::now()->addHours(24);

        $orders = $this->model->with('partner', 'products', 'status')
            ->whereBetween('delivery_dt', [$startDateTime, $endDateTime])
            ->whereHas('status', function ($q) {
                $q->accepted();
            })
            ->orderBy('delivery_dt', 'asc')->get();

        return $orders;
    }

    /**
     * Метод возвращающий список новых заказов
     *
     * @return mixed
     */
    public function getNewOrdersList()
    {
        $orders = $this->model->with('partner', 'products', 'status')
            ->where('delivery_dt', '>', Carbon::now())
            ->whereHas('status', function ($q) {
                $q->new();
            })
            ->orderBy('delivery_dt', 'asc')->limit(50)->get();

        return $orders;
    }

    /**
     * Метод возвращающий список выполненных заказов
     * @return Order[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getReadyOrdersList()
    {
        $orders = $this->model->with('partner', 'products', 'status')
            ->whereBetween('delivery_dt', [Carbon::today(), Carbon::tomorrow()])
            ->whereHas('status', function ($q) {
                $q->ready();
            })
            ->orderBy('delivery_dt', 'desc')->limit(50)->get();
        return $orders;
    }

    /**
     * Метод сохраняющий изменения заказа
     *
     * @param  array  $data
     * @param  Order  $order
     *
     * @return bool
     */
    public function updateOrderData(array $data, Order $order)
    {
        return $order->update($data);
    }
}