<?php

$con = mysqli_connect("localhost", "azubis", "8PM-KKUi?KQJi%G*)KZP", "azubi_lion");
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
//$querry = mysqli_query($con, "INSERT INTO Social VALUES(NULL, 'Hallo', 'WIE' , 'GEHTS')");

//Declaring variables to prevent errors
$fname = "";
$lname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = "";

if (isset($_POST['register_button'])) {
    //removes html tag, removes spaces and makes first char uppercase rest lowercase
    //First Name
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '', $fname);
    $fname = ucfirst(strtolower($fname));
    //Last name
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(strtolower($lname));
    //email
    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));
    //email2
    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = str_replace(' ', '', $email2);
    $email2 = ucfirst(strtolower($email2));
    //password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    $date = date("d-m-Y");

    if ($email == $email2) {
        //Check if email is in valid format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($em, FILTER_VALIDATE_EMAIL);
            //Check if email already exists
            $email_check = mysqli_query($con, "SELECT email FROM Social WHERE email='$email'");
            //Count the numbers of rows returned
            $num_rows = mysqli_num_rows($email_check);

            if ($num_rows > 0) {
                echo "Email already in use";
            }
        } else {
            echo "Invalid Form";
        }
    } else {
        echo "Emails don´t match";
    }

    if (strlen($fname) > 25 || strlen($fname) < 2) {
        echo "Your first name must be between 2 and 25 characters";
    }

    if (strlen($lname) > 25 || strlen($lname) < 2) {
        echo "Your first name must be between 2 and 25 characters";
    }

    if ($password != $password2) {
        echo "Your passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="register.php" method="POST">
    <input type="text" name="reg_fname" placeholder="First Name" required>
    <br>
    <input type="text" name="reg_lname" placeholder="Last Name" required>
    <br>
    <input type="email" name="reg_email" placeholder="Email" required>
    <br>
    <input type="email" name="reg_email2" placeholder="Confirm Email" required>
    <br>
    <input type="password" name="reg_password" placeholder="Password" required>
    <br>
    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
    <br>
    <input type="submit" name="register_button" value="Register">
</form>
<script src="index.js"></script>
</body>
</html>