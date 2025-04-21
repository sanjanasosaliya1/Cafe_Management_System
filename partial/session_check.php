<?php
include("_dbconnect.php"); 

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    
    $query = "SELECT user_id FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $query);
    
    if (!$result || mysqli_num_rows($result) == 0) {
        session_unset();
        session_destroy();
        header("Location: /cafe_management_system/index.php?logout=1");
        exit();
    }
}
?>
