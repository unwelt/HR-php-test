@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2">
            <h3 class="mx-4 my-4">Заказы</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#allOrdersTab">Все</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#staledOrdersTab">Просроченные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#currentOrdersTab">Текущие</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#newOrdersTab">Новые</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#readyOrdersTab">Выполненные</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="allOrdersTab">
                    @include('orders.index.table', ['ordersList' => $allOrdersList])
                    {{$allOrdersList->links('vendor.pagination.bootstrap-4')}}
                </div>
                <div class="tab-pane fade" id="staledOrdersTab">
                    @include('orders.index.table', ['ordersList' => $staledOrdersList])
                </div>
                <div class="tab-pane fade" id="currentOrdersTab">
                    @include('orders.index.table', ['ordersList' => $currentOrdersList])
                </div>
                <div class="tab-pane fade" id="newOrdersTab">
                    @include('orders.index.table', ['ordersList' => $newOrdersList])
                </div>
                <div class="tab-pane fade" id="readyOrdersTab">
                    @include('orders.index.table', ['ordersList' => $readyOrdersList])
                </div>
            </div>
        </div>
    </div>
@endsection