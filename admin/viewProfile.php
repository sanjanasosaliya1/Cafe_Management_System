<?php
    session_start();
    if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']=="true")
    {
        $adminloggedin = true;
        $userid = $_SESSION['adminuserid'];
    }
    else
    {
        $adminloggedin = false;
        $userid = 0;
    }

    if($adminloggedin){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Update profile</title>

    <link rel = "icon" href ="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type = "image/x-icon">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/cafe_management_system/admin/assetsForSideBar/css/styles.css">
    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

</head>
<body id="body-pd" style="background-color: rgba(0, 0, 0, 0.58);">
    <?php

        require("partial/_dbconnect.php");
        require("partial/_nav.php");   
    ?>    
    <div class="container2" style="margin-top: 100px;">
        <?php
            $sql = "SELECT * FROM users WHERE user_id = '$userid'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $username = $row["user_name"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["user_email"];
            $phone = $row["user_phone"];
            $usertype = $row["user_type"]; 
        ?>
        <div class="row">
            <div class="content-panel mb-3" style="display: flex; justify-content:center;">
                <div class="border p-3" style="border: 2px solid rgba(0, 0, 0, 0.1); border: radius 1.1rem; background-color:#fdf8f3;">
                    <h2 class="title text-center">Profile<span class="pro-label label-warning">(<?php echo $usertype;?>)</span></h2>

                    <form action="/cafe_management_system/admin/partial/_manageProfile.php" method="POST">
                        <div class="form-group">
                            <b><label for="username">Username:</label></b>
                            <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $username;?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <b><label for="firstname">First Name:</label></b>
                                <input class="form-control" id="firstname" name="firstname" placeholder="First Name" type="text" required value="<?php echo $firstname;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <b><label for="lastname">Last Name:</label></b>
                                <input class="form-control" id="lastname" name="lastname" placeholder="Last Name" type="text" required value="<?php echo $lastname;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input class="form-control" id="email" name="email" type="text" placeholder="Enter Your Email" value="<?php echo $email;?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+91</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone;?>">
                                </div>    
                            </div>
                            <div class="form-group col-md-6">
                                <b><label for="password">Password:</label></b>
                                <input class="form-control" id="password" name="password" placeholder="Enter Your Password" type="password" required minlength="4" maxlength="21" data-toggle="password">
                            </div>
                        </div>
                        <button type="submit" name="updateProfileDetail" class="btn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="/cafe_management_system/admin/assetsForSideBar/js/main.js"></script>
</body>
</html>

<?php
    }
    else
    {
        header("location:/cafe_management_system/admin/login.php");
    }
?>