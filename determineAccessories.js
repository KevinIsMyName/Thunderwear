// Kevin Wu
// determineAccessories.js
// Functions here determine what accessories (such as umbrella) will be needed.


function determineUmbrella(weatherData) { //dependent on rain value and probability
    for (let hour = 0; hour < 12; hour++) {
        if (weatherData[hour].Rain.Value >= 0.03) {
            return true;
        }
        if (weatherData[hour].RainProbability >= 50) {
            return true;
        }
    }
    return false;
}

function determineJacket(weatherData) { //dependent on realfeel temp and wind speed
    for (let hour = 0; hour < 12; hour++) {
        if (weatherData[hour].RealFeelTemperature.Value <= 55) {
            return true;
        }
        if (weatherData[hour].Wind.Speed.Value >= 12) {
            return true;
        }
    }
    return false;
}

function determineScarf(weatherData) { //dependant on wind speed and snowfall
    for (let hour = 0; hour < 12; hour++) {
        if (weatherData[hour].Wind.Speed.Value >= 20) {
            return true;
        }
        if (weatherData[hour].Snow.Value >= 0.33) {
            return true;
        }
    }
    return false;
}

function determineBoots(weatherData) { //dependent on snow, ice, and temp
    for (let hour = 0; hour < 12; hour++) {
        if (weatherData[hour].Rain.Value >= 0.1) {
            return true;
        }
        if (weatherData[hour].Temperature.Value <= 25 || weatherData[hour].Snow.Value >= 0.5) {
            return true;
        }
        if (weatherData[hour].IceProbability > 80 || weatherData[hour].Ice.Value >= 0.1) {
            return true;
        }
    }
    return false;
}

function determineSunglasses(weatherData) { //dependent on visibility and status of sunniness
    for (let hour = 0; hour < 12; hour++) {
        if (weatherData[hour].Visibility.Value >= 10 || weatherData[hour].IconPhrase.toLowerCase().includes("sunny")) {
            return true;
        }
    }
    return false;
}
