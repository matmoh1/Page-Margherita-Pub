<?php

require("connect.php");

session_start();

if (!empty($_POST['login']) && !empty($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE login = '$login'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if (password_verify($password, $data['password']))
    {
        $_SESSION['user'] = htmlspecialchars($_POST['login']);
    }

}

header('Location: ../account.php');