<?php
    include("_dbconnect.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['updateDetail']))
        {
            $name = $_POST["name"]; 
            $email = $_POST["email"]; 
            $contact = $_POST["contact"]; 
            $address = $_POST["address"]; 

            $sql = "UPDATE site SET system_name = '$name', email = '$email', contact = '$contact', address = '$address' WHERE temp_id = 1";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
                echo "<script>
                    alert('success');
                    window.location = document.referrer;
                </script>";
            }
        }
    }
?>