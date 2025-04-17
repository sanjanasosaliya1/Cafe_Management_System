<?php
   include("_dbconnect.php");
   session_start();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users";

        $result = mysqli_query($conn,$sql);

        if($_POST['vercode']==$_SESSION['vercode'])
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $row = mysqli_fetch_array($result);
                $usertype = $row['user_type'];
    
                if($usertype == "admin" && $username == $row['user_name'] && $password == $row['user_password'])
                {
                    $userid = $row['user_id'];
                    $_SESSION['adminloggedin'] = true;
                    $_SESSION['adminusername'] = $username;
                    $_SESSION['adminuserid'] = $userid;
    
                    header("location:/cafe_management_system/admin/index.php?loginsuccess=true");
                    exit();
                }
                else
                {
                    header("location:/cafe_management_system/admin/login.php?loginsuccess=false");
                }
            }
            else
            {
                header("location:/cafe_management_system/admin/login.php?loginsuccess=false");
            }
        }

        else
        {
            echo "<script>
                alert('Incorrect Captcha');
                window.location = document.referrer;
            </script>";
        }
    }
?>


