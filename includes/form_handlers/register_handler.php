<?php

//Declaring variables to prevent errors
$fname = "";
$lname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

if (isset($_POST['register_button'])) {
    //removes html tag, removes spaces and makes first char uppercase rest lowercase
    //First Name
    $fname = strip_tags($_POST['reg_fname']); //Remove html tag
    $fname = str_replace(' ', '', $fname); //Remove spaces
    $fname = ucfirst(strtolower($fname)); //Uppercase first latter
    $_SESSION['reg_fname'] = $fname; //Stores first name into session variable
    //Last name
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;
    //email
    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));
    $_SESSION['reg_email'] = $email;
    //email2
    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = str_replace(' ', '', $email2);
    $email2 = ucfirst(strtolower($email2));
    $_SESSION['reg_fname'] = $fname;
    $_SESSION['reg_email2'] = $email2;
    //password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);


    $date = date("d-m-Y");

    if ($email == $email2) {
        //Check if email is in valid format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            //Check if email already exists
            $email_check = mysqli_query($con, "SELECT email FROM Social WHERE email='$email'");
            //Count the numbers of rows returned
            $num_rows = mysqli_num_rows($email_check);

            if ($num_rows > 0) {
                array_push($error_array, "Email already in use<br>");
            }
        } else {
            array_push($error_array, "Invalid Email Format<br>");
        }
    } else {
        array_push($error_array, "Emails don´t match<br>");
    }

    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
    }

    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
    }

    if ($password != $password2) {
        array_push($error_array, "Your passwords do not match<br>");
    } else {
        if (preg_match('/[^A-Za-z\d]/', $password)) {
            array_push($error_array, 'Your password can only contain english characters of numbers<br>');
        }
    }
    if (strlen($password > 30 || strlen($password) < 5)) {
        array_push($error_array, 'Your password must be betwen 5 and 30 characters<br>');
    }
    if (empty($error_array)) {
        $password = md5($password);
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM Social WHERE username = '$username'");
        $i = 0;
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM Social WHERE username = '$username'");
        }
        $rand = rand(1, 2);
        if ($rand === 1) {
            $profile_pic = "assets/images/profil_pic/head_carrot.png";
        } else {
            if ($rand === 2) {
                $profile_pic = "assets/images/profil_pic/head_green_sea.png";
            }
        }

        $query = mysqli_query(
            $con,
            "INSERT INTO Social VALUES ('', '$fname', '$username', '$fname', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')"
        );
        array_push($error_array, "<span>You´re all set! Go ahead and login<span><br>");
        //Clear session variable
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
    }
}
?>