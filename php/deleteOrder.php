<?php

require("connect.php");

$idNumber = $_POST['deleteOrderID'];
$answer = false;

$sql = "DELETE FROM workorder WHERE id=$idNumber";
$result = $conn->query($sql);

$answer = true;
echo $answer ? "OK" : "ERROR"

?>