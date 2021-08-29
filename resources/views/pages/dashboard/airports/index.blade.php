@extends('components.master.main')
@section('content')
<div class="container-fluid pt-5 mt-5">
    <div class="row">
        <div class="col">
            <h1 class="page-title">my airports</h1>
        </div>
        <div class="col">

        </div>
        <div class="col  text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">add new</button>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="container bg-light border-radius p-3 shadow">
                <div class="row">
                    <div class="col airport-info">
                        <h2>vilar de luz airport</h2>
                        <h4>maia, portugal</h4>
                        <h1><span id="current-temperature"></span>ºC</h1>
                        <p><span id="current-clouds"></span>%</p>
                        <hr>
                        <p><span id="current-visibility"></span><span id="current-visibility-m"></span></p>
                        <hr>
                        <p><span id="current-wind-direction"></span>º <span id="current-wind-speed"
                                class="ml-2"></span>kts</p>
                        <hr>

                    </div>
                    <div class="col">
                        <div class="text-right"><button class="btn btn-danger">X</button>
                        </div>
                        <br>
                        <div class="text-center my-auto mx-auto">
                            <img style="width: 110px" src="/storage/images/weatherIcons/day.svg">
                        </div>
                        <br>
                        <div class="text-right">
                            <button class="btn btn-primary">see more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="container bg-light border-radius p-2 shadow">
                hello

            </div>
        </div>
    </div>
</div>

@component('components.airports.add.modal')
@endcomponent
<script>
    let lat, long;
    let currentTemperature = document.getElementById('current-temperature');
    let currentClouds = document.getElementById('current-clouds');
    let currentVisibility = document.getElementById('current-visibility');
    let currentVisibilityM = document.getElementById('current-visibility-m');
    let currentWindDirection = document.getElementById('current-wind-direction');
    let currentWindSpeed = document.getElementById('current-wind-speed');
    console.log('hello');
    const proxy = "https://cors-anywhere.herokuapp.com/";
    let api = proxy + "api.openweathermap.org/data/2.5/weather?lat=38.736&lon=-9.142&units=metric&appid=27d1c916bc6f9ef132fd63f304489b6f";
    fetch(api)
    .then(response => {
    return response.json(); 
}).then(data => {
    console.log(data);
    let temp = data.main.temp;
    let clouds = data.clouds.all;
    let visibility = data.visibility;
    if(visibility => 10000) {
        visibility = 'CAVOK'
    } else {
        currentVisibilityM.textContent = 'm';
    }
    let windDirection = data.wind.deg;
    let windSpeed = data.wind.speed;
    currentTemperature.textContent = temp;
    currentClouds.textContent = clouds;
    currentVisibility.textContent = visibility;
    currentWindDirection.textContent = windDirection;
    currentWindSpeed.textContent = windSpeed;

}).catch(err => {
	console.error(err);
});
</script>

<script>
    function searchAirport() {
    let input = document.querySelector("#airport-code");
    let airportCodeInput = input.value;
    
    let airportName = document.getElementById("airport-name"); 
    let airportCode = document.querySelector("#airport-code"); 
    let airportCity = document.getElementById("airport-city");
    let airportCountry = document.getElementById("airport-country"); 
    
    fetch("https://airportix.p.rapidapi.com/airport/code/" + airportCodeInput + "/", {
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
    airportName.textContent = data.data.name.original;
    console.log(data.data.name.original);
    airportCode.textContent = data.data.icao;
    console.log(data.data.icao);
    airportCity.textContent = data.data.city.cityOriginal;
    airportCountry.textContent = data.data.country.countryOriginal;
})
.catch(err => {
	console.error(err);
});
}

</script>

@endsection