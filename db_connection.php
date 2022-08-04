<?php

ob_start(); //Turns on output buffering
session_start();

$timezone = date_default_timezone_get("Europe/Berlin");
$con = mysqli_connect("localhost", "azubis", "8PM-KKUi?KQJi%G*)KZP", "azubi_lion");
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}