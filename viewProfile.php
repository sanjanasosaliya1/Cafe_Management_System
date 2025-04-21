<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />
    <meta name="description" content="Bootstrap navbar examples for any type of project, Bootstrap 4" />  
    <title>Profile</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel = "icon" href ="assets/img/Logo.jpg" type = "image/x-icon">

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

</head>
<style>
.profile-jumbotron {
    display: flex;
    justify-content: center;
    width: 28%;
    border-radius: 50px;
    margin: 0 auto;
    background-color: #fdf8f3;
}

  @media (max-width: 576px) {
        .jumbotron {
           width:90%;
        }
    }
</style>
<body style="background-color: rgba(0, 0, 0, 0.58);">
    <?php include("partial/_dbconnect.php");?>
    <?php require("partial/_nav.php");?>
    <?php
        if($loggedin)
        {   
    ?>

    <div class="container2">
        <?php
            $sql = "SELECT * FROM users WHERE user_id = '$userId'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $username = $row["user_name"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["user_email"];
            $phone = $row["user_phone"];
            $usertype = $row["user_type"]; 
            $profile = $row["user_img"];

        ?>
        <div class="row">
        <div class="jumbotron p-3 mb-3 profile-jumbotron">
                <div class="user-info">
                    <img class="rounded-circle mb-3 bg-dark" src="/cafe_management_system/img/<?php echo empty($profile) ? 'profilePic.jpg' : $profile; ?>" style="width:215px; height:215px; padding:1px;">
                    <form action="partial/_manageProfile.php" method="POST">
                        <small>Remove Image</small>
                        <button type="submit" class="btn" name="removeProfilePic" style="font-size: 12px; padding:3px 8px; border-radius:9px;">Remove</button>
                    </form>
                    <form action="partial/_manageProfile.php" method="POST" enctype="multipart/form-data" style="margin-top: 7px;">
                        <div class="upload-btn-wrapper">
                            <small>Change Image: </small>
                            <button class="btn upload">Choose</button>
                            <input type="file" name="profile" id="profile" accept=".jpg">
                        </div>                        
                        <button type="submit" name="updateProfilePic" class="btn" style="margin-top: -20px; font-size:15px; padding:3px 8px;">Update</button>
                    </form>

                    <ul class="meta list list-unstyled" style="text-align: center;">
                        <li class="username my-2"><a href="viewProfile.php">@<?php echo $username;?></a></li>
                        <li class="name"><?php echo $firstname." ".$lastname; ?>
                            <label class="label label-info">(<?php echo $usertype; ?>)</label>
                        </li>
                        <li class="email"><?php echo $email; ?></li>
                        <li class="my-2"><a href="partial/_logout.php"><button class="btn" style="font-size: 15px; padding:3px 8px;">Logout</button></a></li>
                    </ul>
                </div>
            </div>

            <div class="content-panel mb-3" style="display: flex; justify-content:center;">
                <div class="border p-3" style="border: 2px solid rgba(0, 0, 0, 0.1); border: radius 1.1rem; background-color:#fdf8f3;">
                    <h2 class="title text-center">Profile<span class="pro-label label-warning">(<?php echo $usertype;?>)</span></h2>

                    <form action="partial/_manageProfile.php" method="POST">
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
    <?php
        }
        else
        {
            echo '<div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>Ooops!</h1>
                        </div>
                        <h2>404 - Page not found</h2>
                        <a href="index.php">Go To HomePage</a>
                    </div>
                </div>';
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
        $('#profile').change(function(){
            var i = $(this).prev('button').clone();
            var file = ($('#profile')[0].files[0].name).substring(0 , 5) + "..";
            $(this).prev('button').text(file);
        });
    </script>
</body>
</html>