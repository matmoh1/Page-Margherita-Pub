<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Margherita Pub</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link href="../css/fontello.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/location.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a href="../location.php"><div class="flag"><img src="../img/uk.png" alt="UK"></div></a>
    <div class="page">

        <div class="header clearfix">
            <img src="../img/Logo.png" alt="">
        </div>

        <div class="main">
            <h1 class="center color">Margherita Pub</h1>
            <p class="center edition color">Najlepsza pizza w stolicy</p>
            
            <hr>
                <span class="burger jsActive">MENU<i class="icon-menu"></i></span>
                <ul class="menu jsActive">
                    <li><a href="index.php">O NAS</a></li>
                    <li><a href="order.php">ZAMOW</a></li>
                    <li class="active"><a href="location.php">LOKALIZACJA</a></li>
                    <li><a href="jobs.php">PRACA</a></li>
                    <li><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <h2>Jesteśmy w samym sercu Warszawy</h2>
            <br/>
            
            <div class="columns">
                <p><b>Miasto:</b> Warsaw<br><b>Ulica:</b> Górczewska 124<br><b>Telefon:</b> 111 222 333</p>
                <p><b>Miasto:</b> Warsaw<br><b>Street:</b> Bombardierów 1<br><b>Telefon:</b> 123 123 123</p>
                <p><b>Miasto:</b> Warsaw<br><b>Street:</b> Ledóchowskiej 12<br><b>Telefon:</b> 333 222 111</p>
            </div>
            
            <h2>To proste! Zadzwoń i zamów lub odwiedź naszą restauracje</h2>
            <br>
            <button id="detect">Sprawdź, do której restauracji ma najbliżej!</button>
            <br><br>

            <h2>Sprawdź na mapie gdzie znajdują się nasze restauracje</h2>
            <div class="warsawMap PL"></div>
            <br>
            
            <div class="nearest"></div>
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>Najlepsza pizza w stolicy</b></p>
        </div>

        
    </div>

    <!-- API GOOGLE - lokalizacja  https://developer.mozilla.org/pl/docs/Web/API/Geolocation_API#examples-->
    <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script> 
    <script src="../scripts/distanceCounterPL.js"></script>
    <script src="../scripts/menu.js"></script>
    <script src="../scripts/warsawMap.js"></script>
</body>
</html>