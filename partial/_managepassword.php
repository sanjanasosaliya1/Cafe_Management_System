<?php
include("_dbconnect.php");
session_start();

if (isset($_POST['loginpassword']) && isset($_POST['re-loginpassword']) && isset($_POST['loginusername'])) 
{
    $username = $_POST['loginusername'];
    $newPassword = $_POST['loginpassword'];
    $confirmPassword = $_POST['re-loginpassword'];

    $userCheckSql = "SELECT * FROM users WHERE user_name = '$username'";
    $userCheckResult = mysqli_query($conn, $userCheckSql);

    if (mysqli_num_rows($userCheckResult) > 0) 
    {
        if ($newPassword === $confirmPassword) 
        {
            $sql = "UPDATE users SET user_password = '$newPassword' WHERE user_name = '$username'";
            $result = mysqli_query($conn, $sql);

            if ($result) 
            {
                echo '<script>
                    alert("Password updated successfully.");
                    window.location.href = "/cafe_management_system/index.php"; // Redirect to login page
                </script>';
            } 
            else 
            {
                echo '<script>
                    alert("Update failed, please try again.");
                    window.history.back();
                </script>';
            }
        } 
        else 
        {
            echo '<script>
                alert("Passwords do not match. Please try again.");
                window.history.back();
            </script>';
        }
    } 
    else 
    {
        echo '<script>
            alert("Username does not exist. Please try again.");
            window.history.back();
        </script>';
    }
} 
else 
{
    echo '<script>
        alert("Invalid request. Please try again.");
        window.history.back();
    </script>';
}
?>
