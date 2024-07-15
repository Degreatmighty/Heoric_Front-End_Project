<?php

    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_array($select);
        $id = $row['id'];
        $fullName = $row['full_name'];
        $email = $row['email'];
        $phoneNumber = $row['phone_number'];
        $date = $row['date'];
        $time = $row['time'];

        // Creating a profile image form_banner

        echo "
            <div class='profileFrame'>
                <img src='../dashboard/assets/images/profileImgs/user2.png'>
            </div>
        ";

        // Creating a Profile table

        echo "<table class='profileTable' border='1'>";
            echo "<tr>
                <td>Name</td>
                <td> $fullName</td>
            </tr>";

            echo "<tr>
                <td>Email</td>
                <td> $email</td>
            </tr>";

            echo "<tr>
                <td>Phone Number</td>
                <td> $phoneNumber</td>
            </tr>";

            echo "<tr>
                <td>Reg. Date</td>
                <td> $date</td>
            </tr>";

            echo "<tr>
                <td>Reg. Time</td>
                <td> $time</td>
            </tr>";
        echo "</table>";

        // Creating an Edit Button

        echo "
            <a href='edit_profile.php?edit_profile_id=$id' class='editBtnLink'>
                <button class='editBtn'>Edit Profile</button>
            </a>
        ";

    } else {
        header("location: index.php");
    }
    