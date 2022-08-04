<?php

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
} else {
    header("Location: register.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Swirlfeed</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>