<?php

require("connect.php");

$idNumber = $_POST['deleteJobID'];
$answer = false;

$sql = "DELETE FROM job WHERE id=$idNumber";
$result = $conn->query($sql);

$answer = true;
echo $answer ? "OK" : "ERROR"

?>