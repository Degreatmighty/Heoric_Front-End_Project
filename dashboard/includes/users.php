<?php

    if(mysqli_num_rows($select_admin) == 0){
        header('location: dashboard.php?file=home.php&title=home');
    } else {
     
        /* -------------------------------------------------------
        >>>  Update Status with php wihtout jquery
        ---------------------------------------------------------- */
        /* if(isset($_GET['makeAdmin_id']) || isset($_GET['makeUser_id'])){

            if(isset($_GET['makeAdmin_id'])) {
                $status = "Admin";
                $updateId = "makeAdmin_id";
            } else {
                $status = "User";
                $updateId = "makeUser_id";
            }


            $update = mysqli_query($conn, "UPDATE users SET status='$status' WHERE id='updateId'");
            if($update){
                echo "<p style='color:green'>Successfully Deleted!</p>";
            } else {
                echo "<p style='color:green'>Could not deleted user!</p>";
            }
        }
        */

        //Delete Users

        if(isset($_GET['del_id'])){
            $del_id = $_GET['del_id'];
            $del_user = mysqli_query($conn, "DELETE FROM users WHERE id=$del_id ");
            if($del_user){
                echo "<p style='color:green'>Successfully Deleted!</p>";
            } else {
                echo "<p style='color:green'>Could not deleted user!</p>";
            }
        }

        $select = mysqli_query($conn, "SELECT * FROM users");

        if(mysqli_num_rows($select) > 0){
            // Creating a table of users

            echo "
                <div style='text-align:center; margin-block:20px; font-size: 1.4rem;'>
                    <span>List of Users</span>
                </div>
            ";

            echo "<div id='responseMessage' ;'></div>";

            echo "<table class='profileTable userTable' border='1'>";
                echo "<tr>";
                    echo "<th>S/N</th>";
                    echo "<th>ID</th>";
                    echo "<th>Full Name</th>";
                    echo "<th>Email Address</th>";
                    echo "<th>Phone Number</th>";
                    echo "<th>Profile</th>";
                    echo "<th>Reg Date</th>";
                    echo "<th>Reg Time</th>";
                    echo "<th>Status</th>";
                    echo "<th>Edit</th>";
                    echo "<th>Delete</th>";
                    echo "<th>Make Admin </th>";
                echo "</tr>";

            $serialNo = 1;

            while($row = mysqli_fetch_array($select)){
                $id = $row['id'];
                $fullName = $row['full_name'];
                $email = $row['email'];
                $phoneNumber = $row['phone_number'];
                $profile = $row['profile'];
                $status = $row['status'];
                $date = $row['date'];
                $time = $row['time'];
        
                if (empty($profile)) {
                    $profile = "user2.png";
                } else {
                    $profile = $profile;
                }

                echo "<tr>";
                    echo "<td>$serialNo</td>";
                    echo "<td>$id</td>";
                    echo "<td>$fullName</td>";
                    echo "<td>$email</td>";
                    echo "<td>$phoneNumber</td>";
                    echo "<td>
                        <div class='profileFrame userFrame'>
                            <img src='../dashboard/assets/images/profileImgs/$profile'>
                        </div>
                    </td>";
                    echo "<td>$date</td>";
                    echo "<td>$time</td>";
                    echo "<td>$status</td>";

                    echo "<td><a href='dashboard.php?file=edit-user.php&title=users&edit_id=$id'><button class='editBtn'>Edit</button></a></td>";
                    echo "<td><a href='dashboard.php?file=users.php&title=users&del_id=$id'><button class='DeleteBtn'>Delete</button></a></td>";

                    if($status == "User"){
                        echo "<td><a href='dashboard.php?file=users.php&title=users&makeAdmin_id=$id'><button class='makeAdminBtn' data-table='users' data-column='status' data-id='$id' data-status='Admin' >Make Admin</button></a></td>";
                    } else {
                        echo "<td><a href='dashboard.php?file=users.php&title=users&makeUser_id=$id'><button id='makeUserBtn' class='makeAdminBtn' data-table='users' data-column='status' data-id='$id' data-status='User' >Make User</button></a></td>";
                    }
                    
                echo "</tr>";
                $serialNo++; //add 1 to the table column
                
            }

            echo "</table>";
            
            

        } else {
            header("location: ../dashboard/dashboard.php");
        }
  
    }