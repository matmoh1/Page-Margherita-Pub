<?php

require("connect.php");

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$cost = $_POST['cost'];
$answer = false;

$sqlAdd = "INSERT INTO workorder(`id`, `time`, `name`, `address`, `phone`, `message`, `cost`, `isDone`) VALUES (NULL, current_timestamp(), '$name', '$address', '$phone', '$message', '$cost', 0)";
$result = $conn->query($sqlAdd);

$answer = true;
echo $answer ? "OK" : "ERROR"

?>