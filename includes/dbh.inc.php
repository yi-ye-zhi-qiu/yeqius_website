<?php
$dBServername = "";
$dBUsername = "";
$dBPassword = "";
$dBName = "";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
