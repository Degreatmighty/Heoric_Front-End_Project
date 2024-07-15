<?php

if(isset($_POST['register'])){
    require "../config/config.php";

    $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $phone_number = trim(mysqli_real_escape_string($conn, $_POST['phone_number']));

    
    // ----Working on the password----

    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = trim(mysqli_real_escape_string($conn, $_POST['confirm_password']));

    // Setting the date and timezone
    date_default_timezone_set("Africa/Lagos");
    $date = date("l M d, Y");
    $time = date("h: ia");

    // check If Email/Phone number already exists
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' || phone_number = '$phone_number'");
    if (mysqli_num_rows($check_user) > 0 ){
        header("location: ../register.php?error=user_exists");
    } else {
        if($password === $confirm_password){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Inserting the data to the database if the password is equals to the confirm password
            // creating a connection

            $insert_to_db = mysqli_query($conn, "INSERT INTO users (full_name, email, phone_number, user_password, date, time)
                                            VALUES ('$fullname', '$email', '$phone_number', '$hashed_password', '$date', '$time')");

            if(!$insert_to_db){
                header("location: ../register.php?error=failed");
            } else {
                header("location: ../login.php");
            }
            
        } else {
            header("location: ../register.php?error=wrong_password");
        }
    }
}
