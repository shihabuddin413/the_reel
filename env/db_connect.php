<?php

    $username = "the_reel_admin";
    $password = "1234";
    $hostname = "localhost";
    $database_name = "the_reel";

    $conn = mysqli_connect($hostname, $username, $password, $database_name);

    if ($conn){
        // echo "Mysql is connected";
    } else {
        echo "Mysql is refused to connect";
    }


   

?>

