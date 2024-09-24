<?php

    $host = 'sql306.infinityfree.com';
    $username = 'if0_37341242';
    $password = 'yTqSkOFHdiURrXQ';
    $database = 'if0_37341242_Foodwebsite';

    $conn = new mysqli($host,$username,$password,$database);

    if($conn->connect_error){
        die('There was an error'. $conn->connect_error);
    }
    

?>