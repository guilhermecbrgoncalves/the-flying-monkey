<div class="container-fluid" id="meteorology">
    <div class="row mb-5">
        <div class="col-lg-5 col-md-12">
            <div class="card shadow border">
                <div class="card-header">
                    <h4 class="card-title">metar</h4>
                </div>
                <div class="card-body">
                    <p class="card-text" id="metar-display"></p>
                </div>
            </div>
            <div class="card shadow border mt-5 mb-5">
                <div class="card-header">
                    <h4 class="card-title">taf</h4>
                </div>
                <div class="card-body">
                    <p class="card-text" id="taf-display"></p>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12">
            <div class="container-fluid bg-light border-radius shadow" id="container-decoded-{{$airport->code}}"
                style="background-size: cover;">
                <div class="row p-3 border-radius text-light"
                    style="background-color: rgba(0, 0, 0, 0.582); height: 100%">
                    <div class="col airport-info">
                        <h2>metar decoded</h2>
                        <h4>{{$airport->city}}, {{$airport->country}}</h4>
                        <h1 class="mt-5 mb-3 pt-4 text-center">
                            <span id="temperature-celsius-{{$airport->code}}"></span>ºC /
                            <span id="temperature-fahrenheit-{{$airport->code}}"></span>º F
                        </h1>
                        <h4 class="mb-5 mt-3 text-center"><span id="description-{{$airport->code}}"></span></h4>

                        <p class="mt-5 pt-5">station at <span id="station"></span></p>
                        <p>observed at <span id="time-of-observation-{{$airport->code}}"></span></p>
                    </div>
                    <div class="col-8 metar-table">
                        <table class="table table-decoded text-light text-weight-normal">
                            <tbody>
                                <tr>
                                    <th scope="row">clouds</th>
                                    <td><span id="clouds-{{$airport->code}}"></span> '</td>
                                </tr>
                                <tr>
                                    <th scope="row">visibility</th>
                                    <td><span id="visibility-{{$airport->code}}"></span> M</td>

                                </tr>
                                <tr>
                                    <th scope="row">wind direction</th>
                                    <td><span id="wind-direction-{{$airport->code}}"></span>º</td>
                                </tr>
                                <tr>
                                    <th scope="row">wind speed</th>
                                    <td><span id="wind-speed-{{$airport->code}}"></span> KTS</td>
                                </tr>
                                <tr>
                                    <th scope="row">humidity</th>
                                    <td><span id="humidity-{{$airport->code}}"></span>%</td>
                                </tr>
                                <tr>
                                    <th scope="row">dew point</th>
                                    <td><span id="dew-point-celsius-{{$airport->code}}"></span>º C / <span
                                            id="dew-point-fahrenheit-{{$airport->code}}"></span>º F</td>
                                </tr>
                                <tr>
                                    <th scope="row">altimeter</th>
                                    <td><span id="altimeter-{{$airport->code}}"></span> Hg</td>
                                </tr>
                                <tr>
                                    <th scope="row">pressure</th>
                                    <td><span id="pressure-{{$airport->code}}"></span> hPa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-sm-12 mb-5">
            <div class="bg-light border border-radius shadow">
                <div id="windy" class="bg-light border border-radius shadow"></div>
            </div>
        </div>

        <div class="col-md-5 col-sm-12 mb-5">
            <image style="object-fit: cover" class="bg-light border border-radius shadow"
                src='https://api.sat24.com/crop?type=visual5hdcomplete&lat={{$airport->latitude}}&lon={{$airport->longitude}}&width=1000&height=900&zoom=0.8'
                width=100% height=500>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-5 col-sm-12 mb-5">
            <div class="card shadow border">
                <div class="card-header my-auto">
                    <h4 class="card-title">next days</h4>
                </div>
                <div class="card-body text-dark">
                    <table class="table">
                        <tbody id="container-next-days">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-7 col-sm-12 mb-5">
            <div class="card shadow border">
                <div class="card-header my-auto">
                    <div class="row">
                        <div class="col-6 text-left">
                            <h4 class="card-title" id="which-day">today</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-light mx-2" id="btn-prev-day" style="display: none"
                                onclick="showNextDay(0)">previous day</button>
                            <button class="btn btn-primary" id="btn-next-day" onclick="showNextDay(1)">next
                                day</button>
                        </div>
                    </div>

                </div>
                <div class="card-body text-dark">
                    <table class="table">
                        <tbody id="container-next-days-hourly">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    const options = {
    key: '{{$windyKey}}', // REPLACE WITH YOUR KEY !!!
    lat: {{$airport->latitude}},
    lon: {{$airport->longitude}},
    zoom: 10,
};

windyInit(options, windyAPI => {
    const { picker, utils, broadcast } = windyAPI;
    picker.on('pickerOpened', latLon => {
        const { lat, lon, values, overlay } = picker.getParams();
        const windObject = utils.wind2obj(values);
    });
    picker.on('pickerMoved', latLon => {
    });
    picker.on('pickerClosed', () => {
    });
    broadcast.once('redrawFinished', () => {
        picker.open({ lat: {{$airport->latitude}}, lon: {{$airport->longitude}} });
    });

});

fetch("https://api.checkwx.com/metar/{{$airport->code}}/nearest/decoded", {
	"method": "GET",
	"headers": {
		"X-API-Key": "0e05962c30d44c12a7d3728b36"
	}
})
.then(response => {
    return response.json();
}).then(data => {

    container = document.getElementById('container-decoded-{{$airport->code}}');
 city = "{{$airport->city}}";
 unsplash(city, container);

 let timeOfObservation = new Date(data.data[0].observed);
    if (typeof data.data[0].clouds[0].feet == 'undefined') {
        clouds = data.data[0].clouds[0].code;
    } else {
        clouds = data.data[0].clouds[0].code + " at " +  data.data[0].clouds[0].feet;
    }
    document.getElementById('metar-display').textContent = data.data[0].raw_text;
    document.getElementById('station').textContent = data.data[0].icao;
    document.getElementById('time-of-observation-{{$airport->code}}').textContent = timeOfObservation.toUTCString();
    document.getElementById('clouds-{{$airport->code}}').textContent = clouds;
    document.getElementById('visibility-{{$airport->code}}').textContent = data.data[0].visibility.meters;
    document.getElementById('wind-direction-{{$airport->code}}').textContent = data.data[0].wind.degrees;
    document.getElementById('wind-speed-{{$airport->code}}').textContent = data.data[0].wind.speed_kts;
    document.getElementById('humidity-{{$airport->code}}').textContent = data.data[0].humidity.percent;
    document.getElementById('altimeter-{{$airport->code}}').textContent = data.data[0].barometer.hg;
    document.getElementById('pressure-{{$airport->code}}').textContent = data.data[0].barometer.hpa;
    document.getElementById('dew-point-celsius-{{$airport->code}}').textContent = data.data[0].dewpoint.celsius;
    document.getElementById('dew-point-fahrenheit-{{$airport->code}}').textContent = data.data[0].dewpoint.fahrenheit;
    document.getElementById('temperature-celsius-{{$airport->code}}').textContent = data.data[0].temperature.celsius;
    document.getElementById('temperature-fahrenheit-{{$airport->code}}').textContent = data.data[0].temperature.fahrenheit;

let lat = "{{$airport->latitude}}";
let lon = "{{$airport->longitude}}";
hourlyWeather(lat, lon);

})
.catch(err => {
	console.error(err);
});

fetch("https://api.checkwx.com/taf/{{$airport->code}}/nearest/decoded", {
	"method": "GET",
	"headers": {
		"X-API-Key": "0e05962c30d44c12a7d3728b36"
	}
})
.then(response => {
    return response.json();
}).then(data => {
    document.getElementById('taf-display').textContent = data.data[0].raw_text;
})
.catch(err => {
	console.error(err);
});


</script>
