<!DOCTYPE html>
<html lang="en">
<?php require "includes/head.php"; ?>
<body>

    <?php require "includes/header.php"; ?> 
   
    <section class="titleWrapper">
        <p class="titleText">Login Your Account</p>
    </section>
    
    <div class="form_section">
        <div class="form_wrapper">
            <div class="form_banner">
                <h2>Welcome Back!</h2>
                <p>Welcome back! we are so happy to have you here again. If you haven't created an account with us. check below!</p>
                <p>No account yet? </p>
                <a href="register.php">Register Here</a>
            </div>

            <div class="form_container">
            <?php 
                    if(isset($_GET['success'])){echo "<span class='success_msg'>Account registered successfully!</span>";}
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "no_user"){
                            echo "<span class='no_user_msg'>User does not exist!</span>";
                        }

                        if($_GET['error'] == "incorrect_password"){
                            echo "<span class='incorrect_password_msg'>Incorrect Password!</span>";
                        }
                    }
                ?>
                <h3>Login Account</h3>
                <form action="functions/login_func.php" method="POST">
                    <input type="email" name="email" id="email" placeholder="Enter email address">
                    <input type="password" name="password" id="password" placeholder="Enter password">
                    <button id="loginBtn" type="submit" name="login">Login Here</button>
                </form>
            </div>
        </div>
    </div>


    <?php require "includes/footer.php"; ?>
</body>
</html>