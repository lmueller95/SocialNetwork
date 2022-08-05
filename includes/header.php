<?php

include('../db_connection.php');

session_start();
$con = mysqli_connect("localhost", "azubis", "8PM-KKUi?KQJi%G*)KZP", "azubi_lion");
if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $dbcheck = mysqli_query($con, "SELECT * FROM Social WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($dbcheck);
} else {
    header("Location: register.php");
    exit;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Swirlfeed</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="top_bar">
    <div class="logo">
        <a href="index.php">
            Swirlfeed!
        </a>
    </div>
    <nav>
        <a href="#">
            <?php
            echo $user['username'] ?>
        </a>
        <a href="#">
            <i class="fa-solid fa-house-user fa-lg"></i>
        </a>
        <a href="#">
            <i class="fa-solid fa-envelope fa-lg"></i>
        </a>
        <a href="#">
            <i class="fa-solid fa-gear fa-lg"></i>
        </a>
        <a href="#">
            <i class="fa-solid fa-users fa-lg"></i>
        </a>
        <a href="#">
            <i class="fa-solid fa-bell fa-lg"></i>
        </a>
    </nav>

</div>
<div class="wrapper">