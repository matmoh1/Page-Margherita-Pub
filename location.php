<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Margherita Pub</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link href="css/fontello.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/location.css" rel="stylesheet" type="text/css">
</head>
<body>
<a href="./pl/location.php"><div class="flag"><img src="img/pl.png" alt="PL"></div></a>
    <div class="page">

        <div class="header clearfix">
            <img src="img/Logo.png" alt="">
        </div>

        <div class="main">
            <h1 class="center color">Margherita Pub</h1>
            <p class="center edition color">1<sup>st</sup> pizza in the Polish capital</p>
            
            <hr>
                <span class="burger jsActive">MENU<i class="icon-menu"></i></span>
                <ul class="menu jsActive">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="order.php">ORDER</a></li>
                    <li class="active"><a href="location.php">LOCATION</a></li>
                    <li><a href="jobs.php">JOBS</a></li>
                    <li><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <h2>We have premises in the best Warsaw locations</h2>
            <br/>
            <div class="columns">
                <p><b>City:</b> Warsaw<br><b>Street:</b> Górczewska 124<br><b>Telephone:</b> 111 222 333</p>
                <p><b>City:</b> Warsaw<br><b>Street:</b> Bombardierów 1<br><b>Telephone:</b> 123 123 123</p>
                <p><b>City:</b> Warsaw<br><b>Street:</b> Ledóchowskiej 12<br><b>Telephone:</b> 333 222 111</p>
            </div>
            <h2>Just call us and order or visit our restaurant</h2>
            <br>
            <button id="detect">Check how close we are!</button>
            <br><br>

            <h2>Check on the map where our restaurants are located</h2>
            <div class="warsawMap"></div>
            <br>
            
            <div class="nearest"></div>
            
            
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>The best pizza in the Polish capital</b></p>
        </div>

        
    </div>

    <!-- API GOOGLE - lokalizacja  https://developer.mozilla.org/pl/docs/Web/API/Geolocation_API#examples-->
    <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script> 
    <script src="scripts/distanceCounter.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="scripts/warsawMap.js"></script>
</body>
</html>