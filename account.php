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
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link href="css/fontello.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a href="./pl/account.php"><div class="flag"><img src="img/pl.png" alt="PL"></div></a>
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
                    <li><a href="jobs.php">JOBS</a></li>
                    <li class="active"><a href="account.php">ADMIN</a></li>
                </ul>
            <hr class="lower">

            <section class="adminPanel">

            <?php if (empty($_SESSION['user'])) : ?>
                <form class="login" action="php/login.php" method="post">
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
                    <p>You logged in as <?=$_SESSION['user']?></p>
                    <b><a href="php/logout.php">Log out</a></b>
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
                    xhr.open("POST", "php/updatePassword.php");
                    xhr.onload = function() {
                        if (this.response == "OK") {
                            document.getElementById("changePasswordForm").reset();
                            alert("Password has been changed");
                        }
                        else {
                            alert("Password change failed");
                        }
                    };

                    xhr.send(data);
                    return false;
                }
                </script>

                    <h1>Change Password</h1>
                    <form id="changePasswordForm" onsubmit="return ajaxgo_password()" method="POST">
                        <label for="oldPass" >Old password:</label><br>
                        <input type="password" name="oldPass" id="oldPass" required><br>
                        <label for="newPass" >New password:</label><br>
                        <input type="password" name="newPass" id="newPass" required><br>
                        <input type="hidden" id="login" name="login" value="<?=$_SESSION['user']?>">
                        <button type="submit" name="changePasswordButton">Change</button>
                    </form>

                    <hr>
                    
                    <script>
                    function ajaxgo_addJob() {
                        var data = new FormData();
                        data.append("title", document.getElementById("title").value);
                        data.append("titlePL", document.getElementById("titlePL").value);
                        data.append("description", document.getElementById("description").value);
                        data.append("descriptionPL", document.getElementById("descriptionPL").value);

                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/addJob.php");
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
                    
                    <h2>Add a job offer</h2>
                    <form id="AddJobForm" onsubmit="return ajaxgo_addJob()" method="POST">
                        <label for="title">Title:</label><br>
                        <input type="text" name="title" id="title" required><br>
                        <label for="titlePL">Polish title:</label><br>
                        <input type="text" name="titlePL" id="titlePL" required><br>
                        <label for="description">Description:</label><br>
                        <textarea type="textarea" name="description" id="description" required></textarea><br>
                        <label for="descriptionPL">Polish description:</label><br>
                        <textarea type="textarea" name="descriptionPL" id="descriptionPL" required></textarea><br>
                        <button type="submit" name="AddJobButton">Add</button>
                    </form>
                    
                    <hr>
                    <h2>Job offers</h2>
                    <?php
                        require("php/connect.php");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM job";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
                                echo "<p><b> ID: " . $row["id"] . "</b></p>";
                                echo "<p>Title: " . $row["titleEN"] . "</p><br>";
                            }
                        }
                        $conn->close();
                    ?>

                    <hr>


                    <h2>Delete job offer</h2>

                    <script>
                    function ajaxgo_deleteJob() {
                        var data = new FormData();
                        data.append("deleteJobID", document.getElementById("deleteJobID").value);
                        
                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/deleteJob.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("deleteJobForm").reset();
                                alert("The job offer has been deleted");
                            }
                            else {
                                alert("The job offer could not be deleted");
                            }
                        };

                        xhr.send(data);
                        return false;
                    }
                    </script>

                    <form id="deleteJobForm" onsubmit="return ajaxgo_deleteJob()" method="POST">
                        <label for="deleteJobID">Enter the ID:</label><br>
                        <input type="number" name="deleteJobID" id="deleteJobID" min=1>
                        <button>Delete</button>
                    </form>

                    <hr>
                    <h2>List of orders:</h2>
                    <?php
                        require("php/connect.php");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM workorder";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<p><b>ID:</b> " . $row["id"] . "</p>";
                                echo "<p><b>Date of order:</b> " . $row["time"] . "</p>";
                                echo "<p><b>Purchaser:</b> " . $row["name"] . "<br> <b>Address:</b> " . $row["address"] . "<br><b>Phone:</b> ". $row["phone"] . "</p>";
                                echo "<p><b>Order:</b> " . $row["message"] . "</p>";
                                echo "<p><b>Cost:</b> " . $row["cost"] . "</p><br>";
                            }
                        }
                        $conn->close();
                    ?>

            

            <h2>Delete the completed order</h2>

                    <script>
                    function ajaxgo_deleteOrder() {
                        var data = new FormData();
                        data.append("deleteOrderID", document.getElementById("deleteOrderID").value);
                        
                        //AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/deleteOrder.php");
                        xhr.onload = function() {
                            if (this.response == "OK") {
                                document.getElementById("deleteOrderForm").reset();
                                alert("The order has been removed from the system");
                            }
                            else {
                                alert("Error, check the given ID");
                            }
                        };

                        xhr.send(data);
                        return false;
                    }
                    </script>

                    <form id="deleteOrderForm" onsubmit="return ajaxgo_deleteOrder()" method="POST">
                        <label for="deleteOrderID">Enter the ID:</label><br>
                        <input type="number" name="deleteOrderID" id="deleteOrderID" min=1>
                        <button>Delete</button>
                    </form>
                <?php endif; ?>
            </section>
        </section>

            <br>
            <br/><br/>
            <p class="text center"><b>Margherita Pub<br/>The best pizza in the Polish capital</b></p>
        </div>

        
    </div>

    <script src="scripts/menu.js"></script>
</body>
</html>