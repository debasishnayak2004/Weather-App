<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Weather App</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" id="city" class="form-control" placeholder="Enter city name">
                    <button class="btn btn-primary" id="getWeather">Get Weather</button>
                </div>
            </div>
        </div>

        <div id="weatherResult" class="text-center mt-4" style="display: none;">
            <h1 id="cityName"></h1>
            <h3 id="weather"></h3>
            <h3 id="temperature"></h3>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#getWeather").on("click", function(){
              let city =  $("#city").val();
                $.ajax({
                    url: "https://api.openweathermap.org/data/2.5/weather",
                    type: "GET",
                    data: {
                        q: `${city}`,
                        units: `matric`,
                        appid: `42ea8d4d8cfb1cb026536a4975db4da2`
                    },
                    success: function(info){
                        $("#city").val("")
                        console.log(info)
                        let weather = info.weather[0].main;
                        let temperature = info.main.temp;
                        $("#weatherResult").css("display", "block");
                        $("#cityName").text(` City - ${city}`);
                        $("#weather").text(` Wether - ${weather}`);
                        $("#temperature").text(`Temperature - ${temperature}`);

                    }
                })
            })
        })
    </script>
</body>
</html>
