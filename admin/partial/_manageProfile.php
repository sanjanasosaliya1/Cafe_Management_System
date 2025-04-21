<?php
    include("_dbconnect.php");
    session_start();

    $userId = $_SESSION['adminuserid'];

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
?>