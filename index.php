<?php
    $weather = "";
    $error = "";
    if ($_GET['city']) {
        $url = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city'].",&appid=f797ab8846093ca1ce0dc243e4e1c504");
        $weatherarray = json_decode($url , true);
        $weather = "the weather in ".$_GET['city']." is currently '".$weatherarray['weather'][0]['description']."', ";
        $temp = $weatherarray['main']['temp'];
        $weather .= " temperature being ".$temp."K. ";
        $humidity = $weatherarray['main']['humidity'];
        $weather .= "the humidity is ".$humidity."% ";
        $windspeed = $weatherarray['wind']['speed'];
        $weather .= " and the wind speed is ".$windspeed." m/sec. ";
    }
    if ($_GET['city'] == "") {
        $error .= '<div class="alert alert-danger" role="alert">please enter a city name. </div>';
    }
    
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>weather scraper</title>
    </head>
    <style type="text/css">
        html {
            background: url(weather.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        body {
            background: none;
        }
        .container {
            text-align: center;
            margin-top: 200px;
            width: 600px;
        }
        h1 {
            font-size: 55px;
            font-family: Arial, Helvetica, sans-serif;
        }
        input {
            margin: 20px 0px 0px 0px ;
        }
        .alert {
            text-align: center;
            width: 400px;
            margin:15px auto;
        }
    </style>
    <body>
        <div class="container">
            <h1>What's the weather?</h1>
            <form>
                <div class="form-group">
                    <label for="city">Enter the name of the city</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. Pune , Delhi">
                    <small class="text-muted">Enter the valid city name</small>
                </div>
                <button id="button" type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="result">
                <div class="alert alert-success" role="alert">
                    <?php echo $weather;?>
                </div>
            </div>
            <div id="error">
                <?php echo $error; ?>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        -->
    </body>
</html>