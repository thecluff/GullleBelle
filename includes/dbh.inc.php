<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gulllebelle";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("oops it failed: ".mysqli_connect_error());
}
