<?php

require("connect.php");

$newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);
$oldPass = $_POST['oldPass'];
$login = $_POST['login'];
$answer = false;

$sql = "SELECT * FROM admin WHERE login = '$login'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

if (password_verify($oldPass, $data['password']))
    {
        $sql = "UPDATE admin SET password='$newPass' WHERE login='$login'";
        $result = $conn->query($sql);
        $answer = true;
    }

echo $answer ? "OK" : "ERROR"

?>