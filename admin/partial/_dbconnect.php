<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "cafe_management_system";

    $conn = mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        echo "not connected " . mysqli_connect_error();        
    }
?>