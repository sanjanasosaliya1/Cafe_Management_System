<?php 
    include ("_dbconnect.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
        $userId = $_POST['userId'];

        $query = "DELETE FROM users WHERE user_id = '$userId'";
        $result = mysqli_query($conn, $query);

        if ($result) 
        {
            if (isset($_SESSION['userId']) && $_SESSION['userId'] == $userId) 
            {
                unset($_SESSION["loggedin"]);
                unset($_SESSION["username"]);
                unset($_SESSION["userId"]);
            }

            echo "<script>
                    alert('Removed');
                    window.location = document.referrer;
                </script>";
                exit();
        } 
        else {
            echo "<script>
                alert('Error deleting user.');
                window.location = document.referrer;
            </script>";
            exit();
            }
    } 
    else {
        echo "<script>
                alert('Invalid request!');
            </script>";
    }
?>