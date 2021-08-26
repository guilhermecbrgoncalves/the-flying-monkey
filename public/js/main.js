//PASSWORD VALIDATIONS
function timeValidation() {
    let departureTime = document.querySelector("#departure_time").value;
    let arrivalTime = document.querySelector("#arrival_time").value;

    if (arrivalTime < departureTime) {
        console.log('its invalid')
    } else {
        console.log('is valid')
    }
}