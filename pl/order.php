<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Margherita Pub</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link href="../css/fontello.css" rel="stylesheet" type="text/css">
    <link href="../fancybox-master/dist/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="../css/order.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a href="../order.php"><div class="flag"><img src="../img/uk.png" alt="UK"></div></a>
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
                    <li class="active"><a href="order.php">ZAMOW</a></li>
                    <li><a href="location.php">LOKALIZACJA</a></li>
                    <li><a href="jobs.php">PRACA</a></li>
                    <li><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <h2>Zadźwoń do najbliższej restauracji i zamów teraz: <span class="nearest"></span><br>lub wypełnij formularz poniżej</h2>
            <br>


            <script>
                function ajaxgo_order() {
                    var data = new FormData();
                    var message = "";
                    var cost = 0.0;

                    

                    for (var i=0; i<Number(document.getElementById("counter").value); i++){
                        var pizzaName = `pizzaName${i}`;
                        var small = `pizzaS${i}`;
                        var valueSmall = 0 + Number(document.getElementById(small).value);
                        var small = `priceS${i}`;
                        var priceSmall = 0.0 + Number(document.getElementById(small).value);
                        var normal = `pizzaM${i}`;
                        var valueNormal = 0 + Number(document.getElementById(normal).value);
                        var normal = `priceN${i}`;
                        var priceNormal = 0.0 + Number(document.getElementById(normal).value);
                        var big = `pizzaL${i}`;
                        var valueBig = 0 + Number(document.getElementById(big).value);
                        var big = `priceL${i}`;
                        var priceBig = 0.0 + Number(document.getElementById(big).value);
                        var sum = valueSmall + valueNormal + valueBig;

                        if (sum > 0) {
                            message += document.getElementById(pizzaName).value + ": ";
                            if (valueSmall > 0){
                                message += "Mala - " + valueSmall + " sztuk. ";
                                cost += (valueSmall * priceSmall);
                            }
                            if (valueNormal > 0){
                                message += "Srednia - " + valueNormal + " sztuk. ";
                                cost += (valueNormal * priceNormal);
                            }
                            if (valueBig > 0){
                                message += "Duza - " + valueBig + " sztuk. ";
                                cost += (valueBig * priceBig);
                            }
                            message += "\n";
                        } 
                    }

                    if (cost > 0){
                        data.append("name", document.getElementById("name").value);
                        data.append("address", document.getElementById("address").value);
                        data.append("phone", document.getElementById("phone").value);
                        console.log(message);
                        data.append("message", message);
                        cost = cost.toFixed(2);
                        data.append("cost", cost);
                        
                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../php/order.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("orderForm").reset();
                                alert("Dostaliśmy Twoje zamówienie");
                            }
                            else {
                                alert("Coś poszło nie tak, spróbuj ponownie później");
                            }
                        };

                        xhr.send(data);
                    }
                    else {
                        alert("You have not selected any product");
                    }
                    
                    return false;
                }
            </script>

            <form id="orderForm" onsubmit="return ajaxgo_order()" method="POST">
                <?php
                    require("../php/connect.php");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        echo "<h2 class='center'>We are not currently looking for new employees</h2>";
                    }

                    $sql = "SELECT * FROM dish";
                    $result = $conn->query($sql);
                    $counter = 0;
                    
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<hr>";
                            echo "<div class='item'>";
                            echo "    <a href='../". $row["photo"] . "' data-fancybox='images' data-caption='". $row["namePL"] ."' ><img src='../". $row["photo"] ."'></a>";
                            echo "    <div class='name'>";
                            echo "        <h2>" . $row["namePL"] . "</h2>";
                            echo "        <p>" . $row["descriptionPL"] . "</p>";
                            echo "    </div>";
                            echo "    <div class='price'>";
                            echo "        <p><b>mała:</b> " . $row["priceS"] . " PLN</p>";
                            echo "        <p><b>średnia:</b> " . $row["priceN"] . " PLN</p>";
                            echo "        <p><b>duża:</b> " . $row["priceL"] . " PLN</p>";
                            echo "    </div>";
                            echo "</div>";
                            echo "<div class='itemForm'>";
                            echo "    <label for='pizzaS" . $counter . "'>Mała:</label><input type='number' name='pizzaS" . $counter . "' id='pizzaS" . $counter . "' min=0>";
                            echo "    <label for='pizzaM" . $counter . "'>Średnia:</label><input type='number' name='pizzaM" . $counter . "' id='pizzaM" . $counter . "' min=0>";
                            echo "    <label for='pizzaL" . $counter . "'>Duża:</label><input type='number' name='pizzaL" . $counter . "' id='pizzaL" . $counter . "' min=0>";
                            echo "</div>";
                            echo "<input type='hidden' id='pizzaName" . $counter . "' value=". $row["namePL"] .">";
                            echo "<input type='hidden' id='priceS" . $counter . "' value=". $row["priceS"] .">";
                            echo "<input type='hidden' id='priceN" . $counter . "' value=". $row["priceN"] .">";
                            echo "<input type='hidden' id='priceL" . $counter . "' value=". $row["priceL"] .">";
                            $counter++;
                        }
                    } else {
                        echo "<h2 class='center'>We are not currently looking for new employees</h2>";
                    }

                    echo "<input type='hidden' id='counter' value=". $counter .">";

                    $conn->close();
                ?>
                <br>

            

                <div class="data">
                    <h2>Komu mamy przywieźć pizzę?</h2><br>
                    <label for="name">Imię i nazwisko:</label><br><input name="name" id="name" type="text" required><br>
                    <label for="address">Adres:</label><br><input name="address" id="address" type="text" required><br>
                    <label for="phone">Numer telefonu:</label><br><input name="phone" id="phone" type="text" placeholder="123456789" pattern="[0-9]{9}" required><br>
                    <button>Zamów</button>
                </div>
            
            </form>

            
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>Najlepsza pizza w stolicy</b></p>
        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../fancybox-master/dist/jquery.fancybox.js"></script>
    <script src="../scripts/distanceCounterOrderNumber.js"></script>
    <script src="../scripts/menu.js"></script>
</body>
</html>