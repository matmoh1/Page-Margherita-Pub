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
</head>
<body>
    <a href="./pl/jobs.php"><div class="flag"><img src="img/pl.png" alt="PL"></div></a>
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
                    <li><a href="location.php">LOCATION</a></li>
                    <li class="active"><a href="jobs.php">JOBS</a></li>
                    <li><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <?php
                require("php/connect.php");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    echo "<h2 class='center'>We are not currently looking for new employees</h2>";
                }

                $sql = "SELECT * FROM job";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        echo "<h2>" . $row["titleEN"] . "</h2>";
                        echo "<br><p>" . $row["descriptionEN"] . "</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "<h2 class='center'>We are not currently looking for new employees</h2>";
                }
                $conn->close();
            ?>
            
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>The best pizza in the Polish capital</b></p>
        </div>

        
    </div>

    <script src="scripts/menu.js"></script>
</body>
</html>