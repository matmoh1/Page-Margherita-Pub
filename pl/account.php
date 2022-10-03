<?php
session_start();
?>

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
</head>
<body>
    <a href="../account.php"><div class="flag"><img src="../img/uk.png" alt="PL"></div></a>
    <div class="page">

        <div class="header clearfix">
            <img src="../img/Logo.png" alt="">
        </div>

        <div class="main">
            <h1 class="center color">Margherita Pub</h1>
            <p class="center edition color">1<sup>st</sup> pizza in the Polish capital</p>
            
            <hr>
                <span class="burger jsActive">MENU<i class="icon-menu"></i></span>
                <ul class="menu jsActive">
                    <li><a href="index.php">O NAS</a></li>
                    <li><a href="order.php">ZAMOW</a></li>
                    <li><a href="location.php">LOKALIZACJA</a></li>
                    <li><a href="jobs.php">PRACA</a></li>
                    <li class="active"><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <section class="adminPanel">

            <?php if (empty($_SESSION['user'])) : ?>
                <form class="login" action="../php/loginPL.php" method="post">
                    <label for="lagin">Login:</label><br>
                    <input type="text" name="login" placeholder="Login">
                    <br>
                    <label for="password">Hasło:</label><br>
                    <input type="password" name="password" placeholder="Hasło">
                    <br>
                    <button type="submit">Wejdź do panelu admina</button>
                </form>
            <?php else : ?>
                <div class="logout">
                    <p>Zalogowałeś się jako <?=$_SESSION['user']?></p>
                    <b><a href="../php/logoutPL.php">Wyloguj</a></b>
                </div>

                <hr>
                
                <section class="main">

                <script>
                function ajaxgo_password() {
                    var data = new FormData();
                    data.append("oldPass", document.getElementById("oldPass").value);
                    data.append("newPass", document.getElementById("newPass").value);
                    data.append("login", document.getElementById("login").value);

                    //AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../php/updatePassword.php");
                    xhr.onload = function() {
                        if (this.response == "OK") {
                            document.getElementById("changePasswordForm").reset();
                            alert("Hasło zostało zmienione");
                        }
                        else {
                            alert("Nie udało się zmienić hasła");
                        }
                    };

                    xhr.send(data);
                    return false;
                }
                </script>

                    <h1>Zmień hasło</h1>
                    <form id="changePasswordForm" onsubmit="return ajaxgo_password()" method="POST">
                        <label for="oldPass" >Stare hasło:</label><br>
                        <input type="password" name="oldPass" id="oldPass" required><br>
                        <label for="newPass" >Nowe hasło:</label><br>
                        <input type="password" name="newPass" id="newPass" required><br>
                        <input type="hidden" id="login" name="login" value="<?=$_SESSION['user']?>">
                        <button type="submit" name="changePasswordButton">Zmień</button>
                    </form>

                    <hr>

                    </script>
                    
                    <script>
                    function ajaxgo_addJob() {
                        var data = new FormData();
                        data.append("title", document.getElementById("title").value);
                        data.append("titlePL", document.getElementById("titlePL").value);
                        data.append("description", document.getElementById("description").value);
                        data.append("descriptionPL", document.getElementById("descriptionPL").value);

                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../php/addJob.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("AddJobForm").reset();
                                alert("The job has been added");
                            }
                            else {
                                alert("The job has not been added");
                            }
                        };

                        xhr.send(data);
                        return false;
                    }
                    </script>
                    
                    <h2>Dodaj oferte pracy</h2>
                    <form id="AddJobForm" onsubmit="return ajaxgo_addJob()" method="POST">
                        <label for="title">Tytuł po angielsku:</label><br>
                        <input type="text" name="title" id="title" required><br>
                        <label for="titlePL">Tytuł po polsku:</label><br>
                        <input type="text" name="titlePL" id="titlePL" required><br>
                        <label for="description">Opis po angielsku:</label><br>
                        <textarea type="textarea" name="description" id="description" required></textarea><br>
                        <label for="descriptionPL">Opis po polsku:</label><br>
                        <textarea type="textarea" name="descriptionPL" id="descriptionPL" required></textarea><br>
                        <button type="submit" name="AddJobButton">Add</button>
                    </form>
                    
                    <hr>
                    <h2>Oferty pracy</h2>
                    <?php
                        require("../php/connect.php");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM job";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
                                echo "<p><b> ID: " . $row["id"] . "</b></p>";
                                echo "<p>Title: " . $row["titlePL"] . "</p><br>";
                            }
                        }
                        $conn->close();
                    ?>

                    <hr>


                    <h2>Usuń oferte pracy</h2>

                    <script>
                    function ajaxgo_deleteJob() {
                        var data = new FormData();
                        data.append("deleteJobID", document.getElementById("deleteJobID").value);
                        
                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../php/deleteJob.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("deleteJobForm").reset();
                                alert("Oferta pracy została usunieta");
                            }
                            else {
                                alert("Oferta pracy nie może zostać usunieta");
                            }
                        };

                        xhr.send(data);
                        return false;
                    }
                    </script>

                    <form id="deleteJobForm" onsubmit="return ajaxgo_deleteJob()" method="POST">
                        <label for="deleteJobID">Wprowadź ID:</label><br>
                        <input type="number" name="deleteJobID" id="deleteJobID" min=1>
                        <button>Delete</button>
                    </form>

                    <hr>
                    <h2>Lista zamówień:</h2>
                    <?php
                        require("../php/connect.php");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM workorder";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<p><b>ID:</b> " . $row["id"] . "</p>";
                                echo "<p><b>Data zamówienia:</b> " . $row["time"] . "</p>";
                                echo "<p><b>Zamawiający:</b> " . $row["name"] . "<br> <b>Adres:</b> " . $row["address"] . "<br><b>Numer:</b> ". $row["phone"] . "</p>";
                                echo "<p><b>Zamówienie:</b> " . $row["message"] . "</p>";
                                echo "<p><b>Koszt:</b> " . $row["cost"] . "</p><br>";
                            }
                        }
                        $conn->close();
                    ?>

            

            <h2>Usuń zrealizowane zamówienie</h2>

                    <script>
                    function ajaxgo_deleteOrder() {
                        var data = new FormData();
                        data.append("deleteOrderID", document.getElementById("deleteOrderID").value);
                        
                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../php/deleteOrder.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("deleteOrderForm").reset();
                                alert("Zamówienie zostało usunięte z systemu");
                            }
                            else {
                                alert("Błąd, sprawdź podane ID");
                            }
                        };

                        xhr.send(data);
                        return false;
                    }
                    </script>

                    <form id="deleteOrderForm" onsubmit="return ajaxgo_deleteOrder()" method="POST">
                        <label for="deleteOrderID">Wprowadź ID:</label><br>
                        <input type="number" name="deleteOrderID" id="deleteOrderID" min=1>
                        <button>Delete</button>
                    </form>
                <?php endif; ?>
            </section>
        </section>

            <br>
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>Najlepsza pizza w stolicy</b></p>
        </div>

        
    </div>

    <script src="../scripts/menu.js"></script>
</body>
</html>