@extends('components.master.main')
@section('content')

<div class="container-fluid mt-4 pt-5 pb-2 mb-5 sub-bg">
    <div class="row">
        <div class="col">
            <h1 class="page-title text-muted">my airports</h1>
        </div>
        <div class="col text-center">
            @component('components.airports.sessions')
            @endcomponent
        </div>
        <div class="col text-right my-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New</button>
        </div>
    </div>
</div>

@component('components.airports.cards', ['airports' => $airports])
@endcomponent

@component('components.airports.add.modal')
@endcomponent

<script>
    let api, apiWeather, apiUnsplash, visibility, weatherIcon, container, city;
    const proxy = "https://cors-anywhere.herokuapp.com/";
    let rnd = (Math.random() * (9 - 1) + 1).toFixed(0);

    @foreach ($airports as $airport)
    apiWeather = "https://api.openweathermap.org/data/2.5/weather?lat={{$airport->latitude}}&lon={{$airport->longitude}}&units=metric&appid=27d1c916bc6f9ef132fd63f304489b6f";
    fetch(apiWeather)
    .then(response => {
    return response.json();
}).then(data => {
    console.log(data);

    visibility = data.visibility;
    if(visibility => 10000) {
        visibility = 'CAVOK'
    } else {
        document.getElementById('current-visibility-m-{{$airport->code}}').textContent = 'm';
    }

    weatherIcon = document.getElementById('weather-icon-{{$airport->code}}');
    icon(data.weather[0].main, weatherIcon);
    document.getElementById('current-temperature-{{$airport->code}}').textContent = Math.round(data.main.temp);
    document.getElementById('current-description-{{$airport->code}}').textContent = data.weather[0].description;
    document.getElementById('current-clouds-{{$airport->code}}').textContent = data.clouds.all;
    document.getElementById('current-visibility-{{$airport->code}}').textContent = visibility;
    document.getElementById('current-wind-direction-{{$airport->code}}').textContent = data.wind.deg;
    document.getElementById('current-wind-speed-{{$airport->code}}').textContent = Math.round(data.wind.speed);

    container = document.getElementById('container-{{$airport->code}}');
 city = "{{$airport->city}}";
 unsplash(city, container);

}).catch(err => {
	console.error(err);
});
@endforeach

function searchAirport() {
    let input = document.querySelector("#airport-input");
    let airportInput = input.value;

    fetch(
        "https://airportix.p.rapidapi.com/airport/code/" + airportInput + "/",
        {
            method: "GET",
            headers: {
                "x-rapidapi-host": "airportix.p.rapidapi.com",
                "x-rapidapi-key":
                    "2cfe03511bmshfc3c0ab4a2a97bfp1a2983jsn068ca2df2a6e"
            }
        }
    )
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            document.getElementById("airport-name").textContent =
                data.data.name.original + " - ";
            document.getElementById("airport-code").textContent =
                data.data.icao;
            document.getElementById("airport-city").textContent =
                data.data.city.cityOriginal + ", ";
            document.getElementById("airport-country").textContent =
                data.data.country.countryOriginal;
            document.getElementById("add-airport-btn").style.display = "block";
            document.getElementById("modal-footer").style.display = "block";

            document.getElementById("name").value = data.data.name.original;
            document.getElementById("code").value = data.data.icao;
            document.getElementById("city").value = data.data.city.cityOriginal;
            document.getElementById("country").value =
                data.data.country.countryOriginal;
            document.getElementById("latitude").value =
                data.data.location.latitude;
            document.getElementById("longitude").value =
                data.data.location.longitude;
                document.getElementById("airport-not-found").style.display = "none";
        })
        .catch(err => {
            console.error(err);
            document.getElementById("airport-not-found").style.display = "block";
        });
}

//METEO ICON
function icon(weatherMain, weatherIcon) {
    if (weatherMain == "Thunderstorm") {
        weatherIcon.src = "/storage/images/weatherIcons/thunder.svg";
    } else if (weatherMain == "Drizzle") {
        weatherIcon.src = "/storage/images/weatherIcons/rainy-2.svg";
    } else if (weatherMain == "Rain") {
        weatherIcon.src = "/storage/images/weatherIcons/rainy-5.svg";
    } else if (weatherMain == "Snow") {
        weatherIcon.src = "/storage/images/weatherIcons/snowy-4.svg";
    } else if (weatherMain == "Mist") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Smoke") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Haze") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Dust") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Fog") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Sand") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Dust") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Ash") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Squall") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Tornado") {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    } else if (weatherMain == "Clear") {
        weatherIcon.src = "/storage/images/weatherIcons/day.svg";
    } else if (weatherMain == "Clouds") {
        weatherIcon.src = "/storage/images/weatherIcons/cloudy.svg";
    } else {
        weatherIcon.src = "/storage/images/weatherIcons/50d.png";
    }
}

//UNSPLASH
function unsplash(city, container) {
    let rnd = (Math.random() * (9 - 1) + 1).toFixed(0);
    apiUnsplash = `https://api.unsplash.com/search/photos?query=${city}&client_id=mkS1Z6Z928sfdIZnXRpqI182jbB3qwANg4s52bTOVlE`;
    fetch(apiUnsplash)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(city);
            container.style.backgroundImage =
                "url("+ data.results[rnd].urls.regular + ")";
        })
        .catch(err => {
            console.error(err);
        });
}
</script>
@endsection
