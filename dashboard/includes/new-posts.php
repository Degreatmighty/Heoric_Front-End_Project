<?php

if(mysqli_num_rows($select_admin) == 0){
    header('location: dashboard.php?file=home.php&title=home');
} else {
    echo "<h1>new-posts</h1>"; 
}
