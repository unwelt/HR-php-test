@extends('layout')

@section('content')
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-sm-4">
            <div class="card">

                @includeWhen(($weatherData !== []),'weather.weatherData', ['weatherData' => $weatherData])
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-6 col-form-label">Название города</label>
                            <div class="col-6">
                                <input type="text" class="form-control" name="cityName" value="Брянск"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Узнать погоду</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection