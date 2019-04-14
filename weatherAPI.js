let apiKey = "?apikey=3xDq5hkzS3dFGAvUs84kY95XzCH6BAAS";
let locationKey = "";
let localizedName = "";
let realFeelTemp;
let description;
let degreeUnit = "";

$(document).ready(function () {
    //listener event for enter in text box
    $("#inputBox").keyup(function (event) {
        if (event.keyCode === 13) {
            $("#twelveHourButton").click();
        }
    });

    //listener event for one hour button
    $("#oneHourButton").click(function () {
        findLocationKey();
        setTimeout(function () {
            findOneHourForecast();
        }, 50);
        $("#hours2to12").css("visibility", "hidden");
    });

    $("#twelveHourButton").click(function () {
        findLocationKey();
        setTimeout(function () {
            findTwelveHourForecast();
        }, 50);
    })
});

function findLocationKey() {
    let resourceURL = "http://dataservice.accuweather.com/locations/v1/cities/autocomplete";
    let q = $("#inputBox").val();
    if (q === "") {
        return;
    }
    let requestURL = resourceURL + apiKey + "&q=" + q;
    $.getJSON(requestURL, function (data) {
        console.log("Location Key Data"); //location key data
        console.log(data);

        localizedName = data[0].LocalizedName + ", " + data[0].AdministrativeArea.ID + ", "
            + data[0].Country.LocalizedName;
        locationKey = data[0].Key;
    });
}

function findOneHourForecast() {
    let resourceURL = "http://dataservice.accuweather.com/forecasts/v1/hourly/1hour/";
    let requestURL = resourceURL + locationKey + apiKey + "&details=true";

    $.getJSON(requestURL, function (data) {
        console.log("One Hour Future Info"); //future info by one hour
        console.log(data);

        realFeelTemp = data[0].RealFeelTemperature.Value;
        degreeUnit = data[0].Temperature.Unit;
        description = data[0].IconPhrase;
        $("#oneHourOutput").html(realFeelTemp + "°" + degreeUnit);
    });
}

function findTwelveHourForecast() {
    let resourceURL = "http://dataservice.accuweather.com/forecasts/v1/hourly/12hour/";
    let requestURL = resourceURL + locationKey + apiKey + "&details=true";

    $.getJSON(requestURL, function (data) {
        console.log("Twelve Hour Future Info");
        console.log(data);


        let iterationAsWord;
        let selector;
        for (let i = 0; i < 12; i++) {
            realFeelTemp = data[i].RealFeelTemperature.Value;
            degreeUnit = data[i].Temperature.Unit;
            description = data[i].IconPhrase;

            switch (i) {
                case 0:
                    iterationAsWord = "one";
                    break;
                case 1:
                    iterationAsWord = "two";
                    break;
                case 2:
                    iterationAsWord = "three";
                    break;
                case 3:
                    iterationAsWord = "four";
                    break;
                case 4:
                    iterationAsWord = "five";
                    break;
                case 5:
                    iterationAsWord = "six";
                    break;
                case 6:
                    iterationAsWord = "seven";
                    break;
                case 7:
                    iterationAsWord = "eight";
                    break;
                case 8:
                    iterationAsWord = "nine";
                    break;
                case 9:
                    iterationAsWord = "ten";
                    break;
                case 10:
                    iterationAsWord = "eleven";
                    break;
                case 11:
                    iterationAsWord = "twelve";
                    break;
            }
            selector = "#" + iterationAsWord + "HourOutput";
            $(selector).html("Hour " + iterationAsWord + ": " + realFeelTemp + "°" + degreeUnit);
        }
        $("#prefix").html("12 Hour Forecast");
        $("#hours2to12").css("visibility", "visible");
    });
}