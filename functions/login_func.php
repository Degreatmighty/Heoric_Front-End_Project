<?php
session_start();  

if(isset($_POST['login'])){
    require "../config/config.php";

    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));


   // check If Email is already registered
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check_user) == 0 ){
        header("location: ../login.php?error=no_user");
    } else {

            $fetched_result = mysqli_fetch_array($check_user);
            $user_db_pwd = $fetched_result['user_password'];
        
            if (password_verify($password, $user_db_pwd)) {
                $_SESSION['email'] = $email;

                sleep(3);
                header("Location: ../dashboard/dashboard.php");
                exit();
            } else {
                sleep(3);
                header("Location: ../login.php?error=incorrect_password");
                exit();
            }
    }
}
