let d = new Date();
let n = d.getHours();
let h = n;
function timeValidation() {
    let departureTime = document.getElementById("departure_time");
    let arrivalTime = document.getElementById("arrival_time");

    console.log(departureTime.value);
    console.log(arrivalTime.value);
}

let count = 0;
function showNextDay(day) {
    let btn = document.getElementById("btn-next-day");
    let div = document.getElementById("container-next-days-hourly");
    let tr = div.getElementsByTagName("tr");
    let whichDay = document.getElementById("which-day");
    let btnPrevDay = document.getElementById("btn-prev-day");
    let from, to;

    if (day == 0) {
        from = 0;
        to = 24 - h;
        whichDay.innerHTML = "next hours";
        btnPrevDay.style.display = "none";
        btn.style.display = "unset";
        btn.setAttribute("onClick", `showNextDay(1)`);
    } else if (day == 1) {
        from = 24 - h;
        to = 24 + from;
        whichDay.innerHTML = "tomorrow";
        btn.setAttribute("onClick", `showNextDay(2)`);
        btnPrevDay.setAttribute("onClick", `showNextDay(0)`);
        btnPrevDay.style.display = "unset";
        btn.style.display = "unset";
    } else if (day == 2) {
        whichDay.innerHTML = weekDay(2);
        btnPrevDay.setAttribute("onClick", `showNextDay(1)`);
        btn.style.display = "none";
        from = 24 + (24 - h);
        to = 48;
    }

    for (let i = to; i < 48; i++) {
        tr[i].style.display = "none";
    }

    for (let i = from; i < to; i++) {
        tr[i].style.display = "table-row";
    }

    for (let i = 0; i < from; i++) {
        tr[i].style.display = "none";
    }

    console.log("from: " + from);
    console.log("to: " + to);

    count++;
    if (count > 1) {
        count = 0;
    }
    console.log("count: " + count);
}

function visibility(id1, id2, id3, btn1, btn2, btn3) {
    document.getElementById(btn1).classList.add("btn-primary");
    document.getElementById(btn1).classList.remove("btn-light");
    document.getElementById(btn2).classList.remove("btn-primary");
    document.getElementById(btn3).classList.remove("btn-primary");
    document.getElementById(btn2).classList.add("btn-light");
    document.getElementById(btn3).classList.add("btn-light");
    document.getElementById(id1).style.display = "block";
    document.getElementById(id2).style.display = "none";
    document.getElementById(id3).style.display = "none";

    if (id1 == "charts-maps") {
        document.getElementById("section-title").innerHTML = "charts & maps";
    } else {
        document.getElementById("section-title").innerHTML = id1;
    }
}

function weekDay(day) {
    let date = new Date();
    let dayOfWeekNumber = date.getDay() + day;
    let dayOfTheWeek;

    switch (dayOfWeekNumber) {
        case 0:
            dayOfTheWeek = "Sunday";
            break;
        case 1:
            dayOfTheWeek = "Monday";
            break;
        case 2:
            dayOfTheWeek = "Tuesday";
            break;
        case 3:
            dayOfTheWeek = "Wednesday";
            break;
        case 4:
            dayOfTheWeek = "Thursday";
            break;
        case 5:
            dayOfTheWeek = "Friday";
            break;
        case 6:
            dayOfTheWeek = "Saturday";
            break;
        case 7:
            dayOfTheWeek = "Sunday";
            break;
        case 8:
            dayOfTheWeek = "Monday";
            break;
        case 9:
            dayOfTheWeek = "Tuesday";
            break;
        case 10:
            dayOfTheWeek = "Wednesday";
            break;
        case 11:
            dayOfTheWeek = "Thursday";
            break;
        case 12:
            dayOfTheWeek = "Friday";
            break;
        case 13:
            dayOfTheWeek = "Saturday";
            break;
    }
    return dayOfTheWeek;
}

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
        })
        .catch(err => {
            console.error(err);
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
                "url(" + data.results[rnd].urls.regular + ")";
        })
        .catch(err => {
            console.error(err);
        });
}

function hourlyWeather(lat, lon) {
    let containerNextDays = document.getElementById("container-next-days");
    let containerNextDaysHourly = document.getElementById(
        "container-next-days-hourly"
    );
    let tr;
    //const proxy = "https://cors-anywhere.herokuapp.com/";
    const weatherKey = "27d1c916bc6f9ef132fd63f304489b6f";
    apiWeather = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&units=metric&exclude=minutely&appid=${weatherKey}`;
    fetch(apiWeather)
        .then(response => {
            return response.json();
        })
        .then(data => {
            //NEXT DAYS WEATHER
            let day = 1;
            for (let i = 1; i < 8; i++) {
                tr = document.createElement("tr");

                td = document.createElement("td");
                td.innerHTML = "<b>" + weekDay(day) + "</b>";
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-temperature-high'></i> " +
                    Math.round(data.daily[i].temp.max) +
                    " ºC";
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-temperature-low'></i> " +
                    Math.round(data.daily[i].temp.min) +
                    " ºC";
                tr.appendChild(td);

                td = document.createElement("td");
                icon = document.createElement("img");
                icon.setAttribute("id", `next-days-icon-${day}`);
                td.appendChild(icon);
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-tint mr-2'></i>" +
                    data.daily[i].humidity +
                    " %";
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-wind mr-2'></i>" +
                    Math.round(data.daily[i].wind_speed) +
                    " KTS";
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='far fa-compass mr-2'></i>" +
                    data.daily[i].wind_deg +
                    "º";
                tr.appendChild(td);

                containerNextDays.appendChild(tr);
                day++;

                weatherIcon = document.getElementById(`week-icon-${day}`);
                weatherMain = data.daily[i].weather[0].main;
                //icon(weatherMain, weatherIcon);
            }

            let to = 24 - h - 1;

            for (let i = 0; i < 48; i++) {
                //NEXT DAYS HOURLY
                trNextDaysHourly = document.createElement("tr");
                if (i > to) {
                    trNextDaysHourly.style.display = "none";
                }

                td = document.createElement("td");
                td.textContent = n + "H";
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                icon = document.createElement("img");
                icon.setAttribute("id", `next-days-hourly-icon-${i}`);
                td.appendChild(icon);
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML = Math.round(data.hourly[i].temp) + " ºC";
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.textContent = data.hourly[i].weather[0].main;
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-cloud mr-2'></i>" +
                    data.hourly[i].clouds +
                    " %";
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-eye mr-2'></i>" +
                    data.hourly[i].visibility;
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-tint mr-2'></i>" +
                    data.hourly[i].humidity +
                    " %";
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='fas fa-wind mr-2'></i>" +
                    Math.round(data.hourly[i].wind_speed) +
                    " KTS";
                trNextDaysHourly.appendChild(td);

                td = document.createElement("td");
                td.innerHTML =
                    "<i class='far fa-compass mr-2'></i>" +
                    data.hourly[i].wind_deg +
                    "º";
                trNextDaysHourly.appendChild(td);
                containerNextDaysHourly.appendChild(trNextDaysHourly);

                n++;
                if (n == 25) {
                    n = 1;
                }
            }
        })
        .catch(err => {
            console.error(err);
        });
}
