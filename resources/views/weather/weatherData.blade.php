<div class="weather-data-container">
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2>{{$weatherData['name']}}</h2>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-auto">
            <img class="img-fluid" src="http://openweathermap.org/img/wn/{{$weatherData['weather'][0]['icon']}}@2x.png" />
        </div>
        <div class="col-auto">
            <span class="h1 align-middle">{{$weatherData['main']['temp']}} °C</span>
        </div>
    </div>
</div>
<hr/>