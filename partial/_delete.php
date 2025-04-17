<?php
session_start();
include '_dbconnect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $userId = $_SESSION['userId'];

    $deleteOrder = "DELETE FROM orders WHERE user_id = $userId";
    mysqli_query($conn, $deleteOrder);

    $deleteUser = "DELETE FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $deleteUser);

    if ($result) {
        session_unset();
        session_destroy();

        echo "<script>
            alert('Your account has been deleted successfully.');
            window.location.href = '/cafe_management_system/index.php';
        </script>";
    } 
    else {
        echo "<script>
            alert('Failed to delete account. Please try again.');
            window.location.href = document.referrer;
        </script>";
    }
}
?>