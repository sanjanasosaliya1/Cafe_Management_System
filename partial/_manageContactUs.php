<?php
   include("_dbconnect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
        $userId = $_SESSION['userId'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $orderId = $_POST['orderid'];
        $message = $_POST['message'];
        $password = $_POST['password'];

        $passSql = "SELECT * FROM users WHERE user_id = '$userId'";
        $passResult = mysqli_query($conn,$passSql);
        $passRow = mysqli_fetch_array($passResult);

        if($password == $passRow['user_password'])
        {
            $sql = "INSERT INTO contact (user_id, email, phone_no, order_id, message, time)VALUES('$userId','$email','$phone','$orderId','$message',CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn, $sql);
            $contactId = $conn -> insert_id;
            echo '<script>
                alert("Thanks for Contact us. Your contact id is ' .$contactId. '. We will contact you very soon.");
                window.location.href="http://localhost/cafe_management_system/index.php";  
            </script>';
            exit();
        }
        else{
            echo "<script>
                    alert('Password incorrect!!');
                    window.history.back(1);
                </script>";
            }
        }
?>