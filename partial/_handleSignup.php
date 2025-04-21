<?php
$showAlert=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include ("_dbconnect.php");
    $username=$_POST["username"];
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $profile = "";

    if(isset($_FILES['profile']) && !empty($_FILES['profile']['name']))
    {
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
        $targetfile = $uploaddir.basename($_FILES['profile']['name']);

        if(move_uploaded_file($_FILES['profile']['tmp_name'],$targetfile))
        {
            $profile  = basename($_FILES['profile']['name']);
        }
        else
        {
            echo "<script>alert('Failed to upload profile')
                  window.location = document.referrer
            </script>";
        }    
    }

    //check wheather this username exists
    $existSql = "SELECT * FROM users WHERE user_name='$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0)
    {
        $showError="username already exists";
        header("Location:/cafe_management_system/index.php?signupsuccess=false:error=$showError");
    }
    else
    {
        if($password == $cpassword)
        {
            $sql = "INSERT INTO users(user_name,firstname,lastname,user_email,user_phone,user_type,user_password,user_join_date,user_img) VALUES ('$username','$firstname','$lastname','$email','$phone','user','$password',CURRENT_DATE,'$profile')";
            $result  = mysqli_query($conn,$sql);

            if($result)
            {
                $showAlert = true;
                header("Location:/cafe_management_system/index.php?signupsuccess=true");
            }
            else
            {
                echo"error".mysqli_error($conn);
            } 
        }
        else
        {
            $showError = "Passwords do not match";
            header("Location:/cafe_management_system/index.php?signupsuccess=false:error=$showError");
        }
    }
}

?>