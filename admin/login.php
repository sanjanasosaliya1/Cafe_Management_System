<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>admin login</title>
    <link rel = "icon" href ="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type = "image/x-icon">
    
    <style>
        body{
            width: 100%;
            height: 100%;
        }
        #main{
            width: 100%;
            height: 100%;
            background: white;
        }
        #login-right{
            position: absolute;
            right: 0;
            width: 40%;
            height: 100%;
            background-color: #fdf8f3;
            display: flex;
            align-items: center;
        }
        #login-left{
            position: absolute;
            left: 0;
            width: 60%;
            height: 100%;
            background: #00000061;
            background-image: url("/cafe_management_system/admin/assetsForSideBar/img/Coffee_shop.jpg");
            background-size: cover;
            display: flex;
            align-items: center;
        }
        #login-right .card{
            margin:auto;
            background: rgb(121, 104, 96);
            border-radius: 10px;
        }
        .form-group{
            color:white;
        }
        .form-control{
            background:white;
        }
        .form-control:focus{
            background:rgb(252, 247, 241);
            border: 2px solid rgb(81, 66, 60);
        }
        .logo{
            margin: auto;
            font-size: 8rem;
            background:rgb(207, 179, 148);
            border-radius: 50% 50%;
            height: 29vh;
            width: 13vw;
            display: flex;
            align-items: center;
        }
        .logo img{
            height: 80%;
            width: 80%;
            margin: auto;

        }
        .btn-login{
            background: rgb(54, 45, 35);
            color: white;
            padding: 5px 30px 5px 30px;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .btn-login:hover{
            background: rgb(64, 54, 43);
            color: white;
        }
    </style>
</head>
<body>
    <main id="main" class="bg-dark">
        <div id="login-left">
            <div class="logo">
                <img src="/cafe_management_system/admin/assetsForSideBar/img/sample_logo.png" alt="img" srcset="">
            </div>
        </div>
        <div id="login-right">
            <div class="card col-md-8">
                <div class="card-body">
                    <form action="partial/_handlelogin.php" method="post">
                        <div class="form-group">
                            <label for="username" class="control-label"><b>Username</b></label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label"><b>Password</b></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label for="vercode" class="control-label"><b>Captcha</b></label>
                            <input type="text" name="vercode" id="vercode" class="form-control" placeholder="Captcha Code" required>
                            <img src="captcha.php" alt="Captcha">
                        </div>

                        <center><button type="submit" class="btn-login">Login</button></center>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
        if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false")
        {
            echo '<div class = "alert alert-warning alert-dimissible fade show" role = "alert">
                  <strong>Warning!</strong> Invalid Username or Password
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
        }
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>