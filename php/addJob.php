<?php

require("connect.php");

$title = $_POST['title'];
$titlePL = $_POST['titlePL'];
$description = $_POST['description'];
$descriptionPL = $_POST['descriptionPL'];

$sqlAdd = "INSERT INTO job(id, titleEN, titlePL, descriptionEN, descriptionPL) 
VALUES ('','$title','$titlePL','$description','$descriptionPL')";
$result = $conn->query($sqlAdd);

$answer = true;
echo $answer ? "OK" : "ERROR"

?>