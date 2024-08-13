<?php
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $_SESSION['id '] = $id ;

        $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_array($select);
            $fullName = $row['full_name'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            // $date = $row['date'];
            // $time = $row['time'];
        }
    } else {
        header('location: http://localhost/AllPracticeFolder/Heoric_Front-End_Project/dashboard/dashboard.php?file=home.php&title=home');
    }
?>

<form action="" method="POST" id="profileUpdateForm">
    <div class="messageContainer ">
        <span class="success_msg"></span>
        <span class="failed_msg"></span>
    </div>
    <input type="text" name="profileName" id="profileName" value="<?php echo $fullName ?>" placeholder="Edit Fullname">
    <input type="email" name="profileEmail" id="profileEmail" value="<?php echo $email ?>" placeholder="Edit Email Address" required>
    <input type="phone" name="profileNumber" id="profileNumber" value="<?php echo $phoneNumber ?>" placeholder="Edit Phone Number">
    <span style="font-size: 1rem" >Upload Profile Image (Allowed: *.jpg, *.png)</span>
    <input type="file" class="profileImgInput" name="profileImgInput" id="profileImgInput">
    <button id="updateProfileBtn" class="primaryBtn updateProfileBtn" type="submit" name="updateProfileBtn">Update Profile</button>
</form>