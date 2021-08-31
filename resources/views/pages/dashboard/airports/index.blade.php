@extends('components.master.main')
@section('content')
<div class="container-fluid pt-5 mt-5">
    <div class="row">
        <div class="col">
            <h1 class="page-title">my airports</h1>
        </div>
        <div class="col text-center">
            @component('components.airports.sessions')
            @endcomponent
        </div>
        <div class="col  text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">add new</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        @foreach ($airports as $airport)
        <div class="col-6 mb-3">
            <div class="container-fluid bg-light border-radius shadow" id="container-{{$airport->code}}"
                style="background-size: cover;">
                <div class="row p-3 border-radius text-light"
                    style="background-color: rgba(0, 0, 0, 0.342); height: 100%">
                    <div class="col airport-info">
                        <h2>{{$airport->name}}</h2>
                        <h4>{{$airport->city}}, {{$airport->country}}</h4>
                        <h1><span id="current-temperature-{{$airport->code}}"></span>ºC</h1>
                        <h5><span id="current-description-{{$airport->code}}"></span></h5>
                        <hr>
                        <p><i class="fas fa-cloud"></i> <span id="current-clouds-{{$airport->code}}"></span>%<i
                                class="fas fa-eye ml-4"></i> <span
                                id="current-visibility-{{$airport->code}}"></span><span
                                id="current-visibility-m-{{$airport->code}}"></span></p>
                        <hr>
                        <p><i class="fas fa-compass"></i> <span id="current-wind-direction-{{$airport->code}}"></span>º
                            <i class="fas fa-wind ml-4"></i><span id="current-wind-speed-{{$airport->code}}"
                                class="ml-2"></span>kts</p>
                        <hr>
                    </div>
                    <div class="col">
                        <div class="text-right">
                            <form action="{{route('my-airports-delete', $airport->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">x</button>
                            </form>
                        </div>
                        <br>
                        <div class="text-center my-auto mx-auto">
                            <img style="width: 110px" id="weather-icon-{{$airport->code}}" src="">
                        </div>
                        <br>
                        <div class="text-right">
                            <button class="btn btn-primary" hidden>see more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@component('components.airports.add.modal')
@endcomponent

<script>
    let api, apiWeather, apiUnsplash, temp, clouds, visibility, windDirection, windSpeed, weatherIcon, weatherMain;
    const proxy = "https://cors-anywhere.herokuapp.com/";

    let rnd = (Math.random() * (9 - 1) + 1).toFixed(0);

    //METEO ICON 
function icon(weatherMain, weatherIcon) {
   if (weatherMain == 'Thunderstorm') {
    weatherIcon.src = "/storage/images/weatherIcons/thunder.svg";
   } else if (weatherMain == 'Drizzle') {
    weatherIcon.src = "/storage/images/weatherIcons/rainy-2.svg";
   } else if (weatherMain == 'Rain') {
    weatherIcon.src = "/storage/images/weatherIcons/rainy-5.svg";
   } else if (weatherMain == 'Snow') {
    weatherIcon.src = "/storage/images/weatherIcons/snowy-4.svg";
   } else if (weatherMain == 'Mist') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Smoke') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Haze') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Dust') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Fog') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Sand') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Dust') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Ash') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Squall') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Tornado') {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   } else if (weatherMain == 'Clear') {
    weatherIcon.src = "/storage/images/weatherIcons/day.svg";
   } else if (weatherMain == 'Clouds') {
    weatherIcon.src = "/storage/images/weatherIcons/cloudy.svg";
   }  else {
    weatherIcon.src = "/storage/images/weatherIcons/50d.png";
   }
}

    @foreach ($airports as $airport)

    

    apiWeather = proxy + "api.openweathermap.org/data/2.5/weather?lat={{$airport->latitude}}&lon={{$airport->longitude}}&units=metric&appid=27d1c916bc6f9ef132fd63f304489b6f";
    fetch(apiWeather)
    .then(response => {
    return response.json(); 
}).then(data => {
    console.log(data);

    weatherIcon = document.getElementById('weather-icon-{{$airport->code}}');
    icon(data.weather[0].main, weatherIcon);
    temp = data.main.temp;
    clouds = data.clouds.all;
    visibility = data.visibility;
    if(visibility => 10000) {
        visibility = 'CAVOK'
    } else {
        document.getElementById('current-visibility-m-{{$airport->code}}').textContent = 'm';
    }
    windDirection = data.wind.deg;
    windSpeed = data.wind.speed;

    document.getElementById('current-temperature-{{$airport->code}}').textContent = temp;
    document.getElementById('current-description-{{$airport->code}}').textContent = data.weather[0].description;
    document.getElementById('current-clouds-{{$airport->code}}').textContent = clouds;
    document.getElementById('current-visibility-{{$airport->code}}').textContent = visibility;
    document.getElementById('current-wind-direction-{{$airport->code}}').textContent = windDirection;
    document.getElementById('current-wind-speed-{{$airport->code}}').textContent = windSpeed;

}).catch(err => {
	console.error(err);
});

apiUnsplash = "https://api.unsplash.com/search/photos?query={{$airport->city}}&client_id=mkS1Z6Z928sfdIZnXRpqI182jbB3qwANg4s52bTOVlE";
    fetch(apiUnsplash)
    .then(response => {
    return response.json(); 
}).then(data => {
    console.log(data);
    document.getElementById('container-{{$airport->code}}').style.backgroundImage="url("+ data.results[rnd].urls.regular + ")";
}).catch(err => {
	console.error(err);
});

@endforeach

</script>

<script>
    function searchAirport() {
    let input = document.querySelector("#airport-input");
    let airportInput = input.value;
    
    fetch("https://airportix.p.rapidapi.com/airport/code/" + airportInput + "/", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "airportix.p.rapidapi.com",
		"x-rapidapi-key": "2cfe03511bmshfc3c0ab4a2a97bfp1a2983jsn068ca2df2a6e"
	}
})
.then(response => {
	return response.json();
}).then(data => {
    console.log(data);
    document.getElementById("airport-name").textContent = data.data.name.original + " - ";
    document.getElementById("airport-code").textContent = data.data.icao;
    document.getElementById("airport-city").textContent = data.data.city.cityOriginal + ", ";
    document.getElementById("airport-country").textContent = data.data.country.countryOriginal;
    document.getElementById("add-airport-btn").style.display = "block";
    document.getElementById("modal-footer").style.display = "block";

    document.getElementById("name").value = data.data.name.original;
    document.getElementById("code").value = data.data.icao;
    document.getElementById("city").value = data.data.city.cityOriginal;
    document.getElementById("country").value = data.data.country.countryOriginal;
    document.getElementById("latitude").value = data.data.location.latitude;
    document.getElementById("longitude").value = data.data.location.longitude;
})
.catch(err => {
	console.error(err);
});
}

</script>

@endsection