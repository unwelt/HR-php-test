<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <title>HR-test</title>
</head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">HR Test</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{route('weather')}}">Погода</a>
                <a class="p-2 text-dark" href="{{route('orders.index')}}">Заказы</a>
                <a class="p-2 text-dark" href="{{route('products.index')}}">Продукты</a>
            </nav>
        </div>
        <div id="app" class="content">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
