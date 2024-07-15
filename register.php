<!DOCTYPE html>
<html lang="en">
<?php require "includes/head.php"; ?>
<body>

    <?php include "includes/header.php"; ?> 

    <section class="titleWrapper">
        <p class="titleText">Register an Account</p>
    </section>
    
    <div class="form_section">
        <div class="form_wrapper">
            <div class="form_banner">
                <h2>Come join us!</h2>
                <p>We are so excited to have you here. If you already have an account with us.</p>
                <p>Already have an account? </p>
                <a href="login.php">Login Here</a>
            </div>

            <div class="form_container">
                <?php 
                    if(isset($_GET['success'])){echo "<span class='success_msg'>Account registered successfully!</span>";}
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "failed"){
                            echo "<span class='failed_msg'>Registration Failed!</span>";
                        }

                        if($_GET['error'] == "wrong_password"){
                            echo "<span class='wrong_pwd_msg'>Password do not Match!</span>";
                        }

                        if($_GET['error'] == "user_exists"){
                            echo "<span class='user_exists_msg'>User Already Exists!</span>";
                        }
                    }
                ?>
                <h3>Create an Account</h3>
                <form action="functions/reg_func.php" method="POST">
                    <input type="text" name="fullname" id="fullname" placeholder="Enter full name">
                    <input type="email" name="email" id="email" placeholder="Enter email address">
                    <input type="phone" name="phone_number" id="phone_number" placeholder="Enter phone number">
                    <input type="password" name="password" id="password" placeholder="Enter password">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                    <button type="submit" name="register">Create account</button>
                </form>
            </div>
        </div>
    </div>


    <?php require "includes/footer.php"; ?>
</body>
</html>