<?php
    include("_dbconnect.php");
    session_start();

    $userId = $_SESSION['userId'];

    $profile = "";

    if(isset($_FILES['profile']) && !empty($_FILES['profile']['name']))
    {
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
        $targetfile = $uploaddir.basename($_FILES['profile']['name']);

        if(move_uploaded_file($_FILES['profile']['tmp_name'],$targetfile))
        {
            $profile  = basename($_FILES['profile']['name']);
            $selectsql = "SELECT user_img FROM users WHERE user_id = '$userId'";
            $selectresult = mysqli_query($conn , $selectsql);

            if($selectresult && mysqli_num_rows($selectresult) > 0)
            {
                $row = mysqli_fetch_array($selectresult);
                $oldprofile = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/'.$row['user_img'];

                if(file_exists($oldprofile))
                {
                    unlink($oldprofile);
                }
            }
        }
        else
        {
            echo "<script>alert('Failed to upload profile')
                  window.location = document.referrer
            </script>";
            exit;
        }    
    }

    if(!empty($profile))
    {
        $sql = "UPDATE users SET user_img = '$profile' WHERE user_id = '$userId'";
        $result = mysqli_query($conn , $sql);

        if($result)
        {
            echo "<script>
                    alert('success');
                    window.location=document.referrer;
                </script>";
        }
        else
        {
            echo "<script>
                    alert('image upload failed, please try again');
                    window.location=document.referrer;
                </script>";
        }
    }

    if(isset($_POST["updateProfileDetail"]))
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"]; 

        $passSql = "SELECT * FROM users WHERE user_id = '$userId'";
        $passResult = mysqli_query($conn , $passSql);
        $passRow = mysqli_fetch_assoc($passResult);

        if($password == $passRow['user_password'])
        {
            $sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', user_email = '$email', user_phone = '$phone' WHERE user_id = '$userId'";
            $result = mysqli_query($conn , $sql);

            if($result)
            {
                echo '<script>
                    alert("Update Successfully.");
                    window.history.back(1);
                </script>';
            }
            else
            {
                echo '<script>
                    alert("Update Failed, please try again.");
                    window.history.back(1);
                </script>';
            }
        }
        else
        {
            echo '<script>
                alert("Password is incorrect.");
                window.history.back(1);
            </script>';
        }
    }

    if(isset($_POST["removeProfilePic"]))
    {
        $sql = "SELECT user_img FROM users WHERE user_id = '$userId'";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_array($result);

        $filename = $_SERVER['DOCUMENT_ROOT']."/cafe_management_system/img/".$row['user_img'];

        if(file_exists($filename))
        {
            unlink($filename);
            $removesql = "UPDATE users SET user_img = 'profilePic.jpg' WHERE user_id = '$userId'";
            $removeresult = mysqli_query($conn , $removesql);
            

            if($removeresult)
            {
                echo "<script>alert('Removed');
                    window.location = document.referrer;
                </script>";
            }
        }
        else
        {
            echo "<script>alert('No Photo Available');
                    window.location = document.referrer;
                </script>";
        }
    }

?>