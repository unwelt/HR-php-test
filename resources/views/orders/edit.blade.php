@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h3>Редактирование заказа №{{ $order->id }}</h3>
        </div>
    </div>

    @if ($errors->any())
        <div class="row mt-4">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-12 col-sm-6 offset-sm-3">
            <form method="post" action="{{ route('order.update', $order) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">E-mail клиента:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="client_email" value="{{ $order->client_email }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Партнер:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="partner_id">
                            @foreach($partners as $partner)
                                <option
                                        value="{{ $partner->id }}"
                                        @if($partner->id == $order->partner->id)
                                            selected="selected"
                                        @endif
                                >{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Cтатус заказа:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status_id">
                            @foreach($statuses as $status)
                                <option
                                        value="{{ $status->id }}"
                                        @if($status->id == $order->status->id)
                                        selected="selected"
                                        @endif
                                >{{ $status->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Продукты:</label>
                    <div class="col-sm-8">
                        @foreach($order->products as $product)
                            <div class="row align-self-center">
                                <div class="col-12">
                                    {{ $product->name }} X {{ $product->pivot->quantity }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col-form-label">Сумма заказа:</div>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $order->sum }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-2">
                        <button type="submit" class="btn btn-primary btn-block">Сохранить изменения</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection