<?php
session_start();
require "../config/config.php";
    $id = $_SESSION['id '];

    $profileEditfullName = trim(mysqli_real_escape_string($conn, $_POST['profileName']));
    $profileEditEmail = trim(mysqli_real_escape_string($conn, $_POST['profileEmail']));
    $profileEditNumber = trim(mysqli_real_escape_string($conn, $_POST['profileNumber']));
    $profileEditImgInput = $_FILES['profileImgInput'];

    $profilePicName = $_FILES['profileImgInput']['name'];
    $profilePicTempName = $_FILES['profileImgInput']['tmp_name']; // getting temporary name
    $profilePicSize = $_FILES['profileImgInput']['size'];
    $profilePicError = $_FILES['profileImgInput']['error'];
    $profilePicType = $_FILES['profileImgInput']['type'];

    $profilePicExtArray = explode('.', $profilePicName);
    $profilePicExt = end($profilePicExtArray);

    $allowedExt = array('jpg', 'png', 'jpeg');
    $profilePicUniqId = uniqid().".".$profilePicExt;
    $profileUploadDestination = "../dashboard/assets/images/profileImgs/$profilePicUniqId";


    if (in_array($profilePicExt, $allowedExt )){
        if ($profilePicSize < 1000000){
            $update = mysqli_query($conn, "UPDATE users SET full_name='$profileEditfullName', email='$profileEditEmail', phone_number='$profileEditNumber', profile='$profilePicUniqId' WHERE id='$id'");
            if($update ){
                if(move_uploaded_file($profilePicTempName, $profileUploadDestination)){
                    echo "Successfully Updated!";
                } else {
                    echo "Ooops, it failed!";
                }
            } else {
                echo "Update Failed!";
            }
        } else {
            echo "You can't upload a files bigger than 1mb.";
        }
    } else {
        echo "You are only allowed to upload jpg, jpeg and png files.";
    }