<?php
    session_start();

    echo "logging you out. please wait...";

    unset($_SESSION['adminloggedin']);
    unset($_SESSION['adminusername']);
    unset($_SESSION['adminuserid']);

    header("location:/cafe_management_system/admin/login.php");
?>