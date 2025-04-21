<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>Contact Us</title>
    <link rel = "icon" href ="assets/img/Logo.jpg" type = "image/x-icon">

    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php 
        include("partial/_dbconnect.php");
        include("partial/_nav.php");
    ?>
   
    <div class="contact2" style="background-image: url(assets/img/map.jpg); height:400px;" id="contact">
        <div class="container2" style="margin-top: 0;">
            <div class="row5 contact-container">
                <div class="col-lg-12">
                    <div class="card5 card-shadow border-0 mb-4">
                        <div class="row5" style="gap: 0;">
                            <div class="col-lg-8" style="background: #fdf8f3;">
                                <div class="contact-box p-4">
                                    <div class="row5">
                                        <div class="col-lg-8">
                                            <h4 class="title">Contact Us</h4>
                                        </div>
                                        <?php
                                            if($loggedin)
                                            {
                                        ?>
                                            <div class="col-lg-4">
                                                <div class="icon-badge-container mx-1" style="padding-left: 167px;">
                                                    <a href="#" data-toggle="modal" data-target="#adminReply">
                                                        <i class="far fa-envelope icon-badge-icon"></i>
                                                    </a>
                                                    <div class="icon-badge"><b><span id="totalMessage">0</span></b></div>
                                                </div>
                                            </div>
                                      
                                    </div>
                                    <?php
                                        $passSql = "SELECT * FROM users WHERE user_id = '$userId'";
                                        $passResult = mysqli_query($conn, $passSql);
                                        $passRow = mysqli_fetch_array($passResult);
                                        $email = $passRow['user_email'];
                                        $phone = $passRow['user_phone'];
                                    ?>

                                    <form action="partial/_manageContactUs.php" method="POST">
                                        <div class="row5">
                                            <div class="col-lg-6">
                                                <div class="form-group mt-3">
                                                    <b><label for="email">Email:</label></b>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mt-3">
                                                    <b><label for="phone">Phone No:</label></b>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon">+91</span>
                                                        </div> 
                                                        <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="basic-addon" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" value="<?php echo $phone; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mt-3">
                                                    <b><label for="orderid">Order Id:</label></b>
                                                    <input type="text" class="form-control" id="orderid" name="orderid" placeholder="Order Id" value="0">
                                                    <small id="orderIdHelp" class="form-text text-muted">If Your Problem is not releted to the order(Order Id = 0).</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mt-3">
                                                    <b><label for="password">Password:</label></b>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required data-toggle="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mt-3">
                                                    <textarea class="form-control" id="message" name="message" rows="2" required minlength="6" placeholder="How may we Help You ?"></textarea>
                                                </div>
                                            </div>
                                            
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3"><span>SUBMIT NOW <i class="ti-arrow-right"></i></span></button>
                                                    <button type="button" class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history"><span>HISTORY <i class="ti-arrow-right"></i></span></button>
                                                </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                 <div class="col-lg-12">
                                                    <font style="font-size:22px;">First Login to Contact with Us.<a class="alert-link" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;color:4b2e0d;font-weight:bold;">Login</a></strong></font>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                                $sql = "SELECT * FROM site";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);

                                $systemName = $row['system_name'];
                                $address = $row['address'];
                                $email = $row['email'];
                                $contact = $row['contact'];

                                echo '<div class="col-lg-4 bg-image" style="background-image:url(assets/img/contact.jpg)">
                                    <div class="detail-box p-4" style="color:#4b2e0d">
                                        <h5 class="font-weight-light mb-3">ADDRESS</h5>
                                        <p class="op-7" style="font-weight:bold;">'.$address.'</p>
                                        <h5 class="font-weight-light mb-3 mt-4">CALL US</h5>
                                        <p class="op-7" style="font-weight:bold;">'.$contact.'</p>
                                        <div class="round-social light">
                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=' .$email. '" class="ml-0 text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="far fa-envelope"></i></a>
                                            <a href="https://github.com/" class="text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="fab fa-github"></i></i></a>
                                            <a href="https://youtube.com/" class="text-decoration-none text-white border border-white rounded-circle" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
     <div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #fdf8f3">
                    <h5 class="modal-title" id="adminReply">Admin Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="messagebd" style="background-color:  #fdf8f3">
                    <table class="table-striped table-bordered col-md-12 text-center">
                        <thead style="background-color:#7d6f69">
                            <tr>
                                <th>Contact Id</th>
                                <th>Reply Message</th>
                                <th>Date-Time</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: rgb(254, 254, 254);">
                            <?php
                                $userId=$_SESSION['userId'];
                                $sql = "SELECT * FROM contact_reply WHERE user_id='$userId'";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                while($row = mysqli_fetch_array($result))
                                {
                                    $contactId = $row['contact_id'];
                                    $message = $row['message'];
                                    $dateTime = $row['date_time'];
                                    $count++;
    
                                    echo '<tr>
                                            <td>' .$contactId. '</td>
                                            <td>' .$message. '</td>
                                            <td>' .$dateTime. '</td>
                                        </tr>';
                                }
                                echo '<script>
                                       document.getElementById("totalMessage").innerHTML = "'.$count.'";
                                </script>';
                                if($count == 0)
                                {
                                    ?>
                                    <script>
                                        document.getElementById("messagebd").innerHTML = '<div class="my-1"> You have not receive any message. </div>';
                                    </script>
                                    <?php
                                }    
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>

     <!-- History modal -->
     <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #fdf8f3">
                    <h5 class="modal-title" id="history">Your Sent Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="bd" style="background-color:  #fdf8f3">
                    <table class="table-striped table-bordered col-md-12 text-center">
                        <thead style="background-color: #7d6f69;">
                            <tr>
                                <th>Contact Id</th>
                                <th>Order Id</th>
                                <th>Message</th>
                                <th>Date-Time</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: rgb(254, 254, 254);">
                            <?php
                                $sql = "SELECT * FROM contact WHERE user_id = '$userId'";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                while($row = mysqli_fetch_array($result))
                                {
                                    $contactId = $row['contact_id'];
                                    $orderId = $row['order_id'];
                                    $message = $row['message'];
                                    $time = $row['time'];
                                    $count++;
    
                                    echo '<tr>
                                            <td>' .$contactId. '</td>
                                            <td>' .$orderId. '</td>
                                            <td>' .$message. '</td>
                                            <td>' .$time. '</td>
                                        </tr>';
                                }
                                if($count == 0)
                                {
                                    ?>
                                    <script>
                                        document.getElementById("bd").innerHTML = '<div class="my-1"> You have not Contacted us. </div>';
                                    </script>
                                    <?php
                                }    
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>