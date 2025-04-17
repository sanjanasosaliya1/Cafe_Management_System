<?php
include("_dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $action = $_POST['action'];
    $food_id = $_POST['food_id'];
    $user_id = $_POST['user_id'];

    if ($action == 'add') 
    {
        $sql = "INSERT INTO eatlist (user_id, food_id,added_date) VALUES ('$user_id', '$food_id',CURRENT_DATE)";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
    } 
    elseif ($action == 'remove') 
    {
        $sql = "DELETE FROM eatlist WHERE user_id = '$user_id' AND food_id = '$food_id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>