<?php  

    if ($_GET["city"]) {
		
		$filteredCity = str_replace(" ", "", $_GET["city"]);
        # code...
        $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/" . $filteredCity . "/forecasts/latest");
		
//		echo $forecastPage;
        $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
//		
//		echo $pageArray[1];
//		
		$secondPartArray = explode("</span></span></span>", $pageArray[1]);
//		
		$weather = $secondPartArray[0];
    }

?>


<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Weather Forecast App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
    
</head>

<body>

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <div class="jumbotron">
        <div class="container">
            <h1>Want to find out the weather forecast about a place?</h1>

            <p>Enter a city name to look up the weather forecast.</p>
            
            <form action="" role="form">
				

				<div class="form-group">
					<label for="city">City Lookup</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="E.g Paris, London">
				</div>



				<button type="submit" class="btn btn-custom">Check Weather</button>
                <div class="displayBox">
                    <?php 
						if($weather) {
							echo '<div class="alert alert-success">' . $weather . '</div>';
						} else {
							echo '<div class="alert alert-danger">Unable to find city</div>';
						}
					?>
                </div>
			</form>
        </div>
    </div>
    
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
