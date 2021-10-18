//PASSWORD VALIDATIONS

console.log('hi');
function timeValidation() {
    let departureTime = document.getElementById("departure_time");
    let arrivalTime = document.getElementById("arrival_time");

    console.log(departureTime.value);
    console.log(arrivalTime.value);
}

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

 //UNSPLASH
 function unsplash(city, container){
    let rnd = (Math.random() * (9 - 1) + 1).toFixed(0);
    apiUnsplash = `https://api.unsplash.com/search/photos?query=${city}&client_id=mkS1Z6Z928sfdIZnXRpqI182jbB3qwANg4s52bTOVlE`;
    fetch(apiUnsplash)
    .then(response => {
    return response.json();
}).then(data => {
    console.log(city);
    container.style.backgroundImage="url("+ data.results[rnd].urls.regular + ")";
}).catch(err => {
	console.error(err);
});
 }

 function hourlyWeather(lat, lon) {
    let d = new Date();
    let n = d.getHours();
    let container = document.getElementById('hourly');
    let tr;

    const proxy = "https://cors-anywhere.herokuapp.com/";
    const weatherKey = "27d1c916bc6f9ef132fd63f304489b6f";
    apiWeather = proxy + `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&units=metric&exclude=minutely&appid=${weatherKey}` ;
    fetch(apiWeather)
    .then(response => {
    return response.json();

}).then(data => {
    console.log(data);

    for (let i = 0; i< 12; i++) {
        tr = document.createElement('tr');

        if(i >= 7) {
            tr.style.display = 'none';
        }

            td = document.createElement('td');
            td.textContent = n + "H";
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = data.hourly[i].temp  + " ºC";
            tr.appendChild(td);

            td = document.createElement('td');
            td.textContent = data.hourly[i].weather[0].main;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = "<i class='fas fa-cloud mr-2'></i>" + data.hourly[i].clouds + " %";
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = "<i class='fas fa-eye mr-2'></i>" + data.hourly[i].visibility;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = "<i class='fas fa-tint mr-2'></i>" + data.hourly[i].humidity + " %";
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = "<i class='fas fa-wind mr-2'></i>" + data.hourly[i].wind_speed + " KTS";
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerHTML = "<i class='far fa-compass mr-2'></i>" + data.hourly[i].wind_deg + "º";
            tr.appendChild(td);

            container.appendChild(tr);

  n++

    }

   // weatherIcon = document.getElementById('weather-icon-{{$airport->code}}');
   //icon(data.weather[0].main, weatherIcon);

}).catch(err => {
	console.error(err);
});

 }

 let btnShowWeather = document.getElementById("showWeather");
 function showMoreWeather() {
     hourly = document.getElementById("hourly");
     tr = hourly.getElementsByTagName("tr");
     for (let i = 0; i < tr.length; i++) {
        tr[i].style.display = 'table-row';
     }

     btnShowWeather.textContent = "show less";
     btnShowWeather.setAttribute( "onClick", "showLessWeather()" );

 }

 function showLessWeather() {
    hourly = document.getElementById("hourly");
    tr = hourly.getElementsByTagName("tr");
    for (let i = 7; i < tr.length; i++) {
       tr[i].style.display = "none";
    }

    btnShowWeather.textContent = "show more";
    btnShowWeather.setAttribute( "onClick", "showMoreWeather()" );
}
