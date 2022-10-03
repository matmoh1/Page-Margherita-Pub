<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Margherita Pub</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    
    <link href="fancybox-master/dist/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="css/fontello.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a href="./pl/index.php"><div class="flag"><img src="img/pl.png" alt="PL"></div></a>
    <div class="page">

        <div class="header clearfix">
            <img src="img/Logo.png" alt="">
        </div>

        <div class="main">
            <h1 class="center color">Margherita Pub</h1>
            <p class="center edition color">1<sup>st</sup> pizza in the Polish capital</p>
            
            <hr>
                <span class="burger jsActive">MENU<i class="icon-menu"></i></span>
                <ul id="6" class="menu jsActive">
                    <li class="active"><a href="index.php">HOME</a></li>
                    <li><a href="order.php">ORDER</a></li>
                    <li><a href="location.php">LOCATION</a></li>
                    <li><a href="jobs.php">JOBS</a></li>
                    <li><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <div class="location">
                <h2>Weather in Warsaw</h2>
                <p class="degree"></p>
                <p class="weatherDescription"></p>
                <p><b>We are sure that this is a good reason to eat our pizza</b></p>
            </div>
            <br>

            <h2>Our story</h2>
            <br/>
            <p class="justify">In 1972, friends from WAT Mateusz and Dawid opened the first pizzeria in the Polish city of Warsaw, in the Masovian Voivodeship. A year after its opening, it was officially the best pizzeria in the Polish capital. Then, after exactly 50 years, this website was created, which became a window to the world for the best pizza in the city. In these difficult pandemic times and the forced revolution in the structure of the company, which has turned from the most popular place to the best internet pizzeria with traditions, we invite you to try a pizza from the already famous Margherita Pub.
            </p>
            <br>
            <h2 ><b>What makes us special?</b></h2>
            <br>
            <p class="justify">Amazing recipes passed down from generation to generation. 50 years of tradition. Pizza created with passion are simple slogans used by every restaurant. We do not have to, our customers do not need to be convinced of the highest quality of our delicacies. In addition, we are awarded each year with the award for the best pizza in the capital for 10 years without a break.</p>
            <br>
            <h2>Take a look and find out about the highest quality of our restaurants</h2>
            <br>
            <div class="galleryWrapper">
                <a data-fancybox="gallery" href="img/gallery/1.jpg"><img src="img/gallery/small/1.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/2.jpg"><img src="img/gallery/small/2.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/3.jpg"><img src="img/gallery/small/3.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/4.jpg"><img src="img/gallery/small/4.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/5.jpg"><img src="img/gallery/small/5.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/6.jpg"><img src="img/gallery/small/6.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/7.jpg"><img src="img/gallery/small/7.jpg"></a>
                <a data-fancybox="gallery" href="img/gallery/8.jpg"><img src="img/gallery/small/8.jpg"></a>
            </div>
            <br/>
            <p class="text center"><b>Margherita Pub<br/>The best pizza in the Polish capital</b></p>
        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="fancybox-master/dist/jquery.fancybox.js"></script>
    <script src="scripts/weather.js"></script>
    <script src="scripts/menu.js"></script>
</body>
</html>