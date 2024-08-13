<?php 
    session_start();    
    require "includes/header.php";
    require "functions/functions.php";
    require "../config/config.php";
    
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        header('location: index.php');
    }

    $select_admin = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email' and status = 'Admin' ");
?>

<body>

    <!-- ====== Navigation Header Starts Here ======= -->
    <nav class="navContainer">
        <div class="logoContainer">
            <a href="dashboard.php"><img src="assets/images/logo.png" alt=""></a>
        </div>

        <div class="logoutContainer">
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>


    <!-- ====== Main Container Starts Here ======= -->
    <main class="mainContainer">
        <!-- ---- Side Bar -----  -->
         <div class="sideBar">
            <div class="sidebarMenu"><a href="dashboard.php?file=home.php&title=home"><i class="fas fa-home"></i>Home</a></div>
            <div class="sidebarMenu"><a href="dashboard.php?file=profile.php&title=profile"><i class="fas fa-user"></i>Profile</a></div>
            
            
            <?php
                if(mysqli_num_rows($select_admin) > 0){
                    
                    
           ?>
                <div class="sidebarMenu"><a href="dashboard.php?file=users.php&title=users"><i class="fas fa-users"></i>Users</a></div>

                <div class="sidebarMenu">
                    <div class="sideBarMenuItem">
                        <a href="#"><i class="fab fa-telegram"></i> Posts <span class="angleDown"><i class="fas fa-angle-down"></i></span></a>
                    </div>
                    <div class="dropdown">
                        <div class="dropdownMenu">
                            <a href="dashboard.php?file=new-posts.php&title=new-posts"><i class="fas fa-angle-right"></i>Add New Posts</a>
                        </div>
                        <div class="dropdownMenu">
                            <a href="dashboard.php?file=view-posts.php&title=view-posts"><i class="fas fa-angle-right"></i>View Posts</a>
                        </div>
                    </div>
                </div>

                <div class="sidebarMenu">
                    <div class="sideBarMenuItem">
                        <a href="#"><i class="fa fa-shopping-cart"></i>Products <span class="angleDown"><i class="fas fa-angle-down"></i></span></a>
                    </div>
                    <div class="dropdown">
                        <div class="dropdownMenu">
                            <a href="dashboard.php?file=new-products.php&title=new-products"><i class="fas fa-angle-right"></i>Add New Products</a>
                        </div>
                        <div class="dropdownMenu">
                            <a href="dashboard.php?file=view-products.php&title=view-products"><i class="fas fa-angle-right"></i>View Products</a>
                        </div>
                    </div>
                </div>

            <?php
                }
            ?>

            <div class="sidebarMenu"><a href="dashboard.php?file=notification.php&title=notification"><i class="fas fa-bell"></i>Notification</a></div>

           <?php
                if(mysqli_num_rows($select_admin) > 0){
                    
                    
           ?>
                <div class="sidebarMenu"><a href="dashboard.php?file=comments.php&title=comments"><i class="fas fa-comment"></i>Comments</a></div>
           <?php
                }
           ?>
            <div class="sidebarMenu"><a href="dashboard.php?file=tutorial.php&title=tutorial"><i class="fas fa-video"></i>Tutorial</a></div>
            <div class="sidebarMenu"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
         </div>

         <!-- ---- Main Body -----  -->
         <div class="mainBody">
            <div class="titleContainer">
                <!-- getting the title from the url  -->
                <h2><?php echo getTitle (); ?></h2>
            </div>

            <div class="mainContent">
                <!-- <div class="messageContainer ">
                    <span class="success_msg"></span>
                    <span class="failed_msg"></span>
                </div> -->
                <?php
                    getFile();
                ?>
            </div>
         </div>
    </main>

    


<script src="javascript/dashboardScript.js"></script>
<!-- <script src="./dashboard\javascript\jquery.js"></script> -->
</body>