<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include("_dbconnect.php");
        session_start();
        $username = $_POST["loginusername"];
        $password = $_POST["loginpassword"];

        $sql = "SELECT * FROM users WHERE user_name = '$username'";
        $result = mysqli_query($conn,$sql);

        if($_POST['vercode']==$_SESSION['vercode'])
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
            
                if($username == $row['user_name'] && $password == $row['user_password'])
                {
                    $userId = $row['user_id'];
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['userId'] = $userId;
                    header("Location:/cafe_management_system/index.php?loginsuccess=true");
                    exit();
                }
                else
                {
                    header("Location:/cafe_management_system/index.php?loginsuccess=false");    
                }
                
            }
            else
            {
                header("Location:/cafe_management_system/index.php?loginsuccess=false");   
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