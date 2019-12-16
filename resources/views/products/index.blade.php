@extends('layout')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2">
            <h3 class="mx-4 my-4">Продукты</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th>Номер продукта</th>
                    <th>Наименование продукта</th>
                    <th>Наименование поставщика</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productsList as $product)
                    <tr class="text-center">
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            {{ $product->vendor->name }}
                        </td>
                        <td class="text-center">
                            <price-controller :current-price="{{ $product->price }}"
                                          :update-route="'{{ route('product.update', $product) }}'">
                            </price-controller>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {{$productsList->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection