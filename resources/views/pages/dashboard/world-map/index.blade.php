@extends('components.master.main')
@section('content')

<div class="container-fluid sub-bg">
    <div class="row">
        <div class="col-md-3 col-sm-12 my-auto">
            <h1 class="page-title mt-4 pt-5 pb-2 text-muted">world map</h1>
        </div>
        <div class="col-md-6 col-sm-12 my-auto text-center">
            <div class="mt-4 pt-5 pb-2 text-center">
                @component('components.airports.sessions')
                @endcomponent
            </div>
        </div>
        <div class="col-md-3 col-sm-12 my-auto">
            <div class="row">
                <div class="col-8 mt-4 pt-5 pb-2">
                    <input type="text" id="world-search" class="form-control"
                        placeholder="Please type the country iso code" />
                </div>
                <div class="col-4 mt-4 pt-5 pb-2">
                    <button class="btn btn-primary" type="button" onclick="searchAirportMap()">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="world-map" style="width: 100%; height: 85vh"></div>

<script>
    function initMap() {
  const myLatLng = { lat: 20, lng: 0};
  const map = new google.maps.Map(document.getElementById("world-map"), {
    zoom: 3,
    center: myLatLng,
    gestureHandling: "greedy",
  });
}

function searchAirportMap() {

    let input = document.querySelector("#world-search");
    let airport = input.value;

    let airports;

    fetch(`https://airportix.p.rapidapi.com/airport/country_code/${airport}/%7Bclassification%7D`, {
        method: "GET",
        headers: {
            "x-rapidapi-host": "airportix.p.rapidapi.com",
            "x-rapidapi-key":
                "2cfe03511bmshfc3c0ab4a2a97bfp1a2983jsn068ca2df2a6e"
        }
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            airports = data.data;
            console.log(airports);
            var myLatlng = { lat: parseFloat(airports[0].location.latitude), lng: parseFloat(airports[0].location.longitude)};
           var mapOptions = {
           zoom: 4,
           center: myLatlng
        }

var map = new google.maps.Map(document.getElementById("world-map"), mapOptions);
            for(let i=0; i < airports.length; i++) {
                var myLatlng = new google.maps.LatLng(airports[i].location.latitude, airports[i].location.longitude);
                var marker = new google.maps.Marker({
                position: myLatlng,
                title: airports[i].icao});
                marker.setMap(map);
                let infowindow = new google.maps.InfoWindow({
                content: `<div style="width: 250px">
                    <p><b>${airports[i].icao} - ${airports[i].name.translated.en}</b></p>
                    <p><b>Latitude:</b> ${airports[i].location.latitude}</p>
                    <p><b>Longitude:</b> ${airports[i].location.longitude}</p><br>
                    <form method="POST" action="{{route('my-airports-store')}}">
        @csrf
        <input type="text" id="airport-name-${i}" name="name" value="${airports[i].name.translated.en}" hidden>
        <input type="text" id="airport-code-${i}" name="code" value="${airports[i].icao}" hidden>
        <input type="text" id="airport-city-${i}" name="city" value="${airports[i].city.cityTranslated.en}" hidden>
        <input type="text" id="airport-country-${i}" name="country" value="${airports[i].country.countryOriginal}" hidden>
        <input type="text" id="airport-latitude-${i}" name="latitude" value="${airports[i].location.latitude}" hidden>
        <input type="text" id="airport-longitude-${i}" name="longitude" value="${airports[i].location.longitude}" hidden>
        <button class="btn btn-primary mt-4 mx-auto" type="submit">add to my airports</button>
    </form>
                    </div>`,
                 });
               google.maps.event.addListener(marker, "click", () => {
              infowindow.open(map, marker);
               });
            }
        })
        .catch(err => {
            console.error(err);
        });
}
</script>
@endsection
