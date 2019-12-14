@extends('layout')

@section('content')
    <form>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Название города</label>
            <div class="col-sm-10">
                <input type="text" name="cityName" value="Брянск"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Узнать погоду</button>
            </div>
        </div>
    </form>
@endsection