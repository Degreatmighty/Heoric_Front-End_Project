<?php 
    require "../config/config.php";

    $table = trim($_POST['table']);
    $column = trim($_POST['column']);
    $id = trim($_POST['id']);
    $status = trim($_POST['status']);
    

    // Fetch the user's email from the database using the user ID
    $emailQuery = mysqli_query($conn, "SELECT email FROM users WHERE id='$id'");
    if ($emailRow = mysqli_fetch_assoc($emailQuery)) {
        $email = $emailRow['email'];

        $update = mysqli_query($conn, "UPDATE $table SET $column='$status' WHERE id='$id'");
        if($update){
            echo "<span style='color: #FFCC99'>$email</span> status has been successfully updated!";
        } else {
            echo "Update failed for $email!";
        }
    } else {
        echo "No user found with the given ID.";
    }



