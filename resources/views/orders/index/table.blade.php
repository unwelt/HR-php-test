<div class="row">
    <div class="col-12">


        <table class="table table-striped">
            <thead>
            <tr class="text-center">
                <th>Номер заказа</th>
                <th>Статус заказа</th>
                <th>Сумма заказа</th>
                <th>Состав</th>
                <th>Партнер</th>
            </tr>
            </thead>
            <tbody>
                @foreach($ordersList as $order)
                    <tr class="text-center">
                        <td>
                            <a href="{{route('order.edit', ['id' => $order->id])}}" target="_blank"
                               title="Редактировать заказ №{{$order->id}}">{{$order->id}}</a>
                        </td>
                        <td>
                            {{$order->status->title}}
                        </td>
                        <td class="text-center">
                            {{$order->sum}}
                        </td>
                        <td>
                            {{$order->products->implode('name', ', ')}}
                        </td>
                        <td>
                            {{$order->partner->name}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>