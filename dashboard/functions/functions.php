<?php

//  Get the DASHBOARD page title from the url  -->

function getTitle() {
    if(isset($_GET['title'])){
        $title = $_GET['title'];
        $title = str_replace('-', ' ', $title);
        $title = ucwords(strtolower($title));
        return $title;
    } else {
        return  "Dashboard";
    }
}

//  Include files to the DASHBOARD -->
function getFile() { 
    global $email, $conn, $select_admin; 
    if(isset($_GET['file'])){
       $file = $_GET['file'];
       $include = include "includes/$file";
       return $include;
    } else {        
        include "includes/home.php";
    }
}

