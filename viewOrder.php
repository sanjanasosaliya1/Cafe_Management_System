<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR ORDER</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel = "icon" href ="assets/img/Logo.jpg" type = "image/x-icon">

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

</head>

<style>
    @media screen and (max-width: 768px) {
    .table-title .row4 .col-sm-4,
    .table-title .row4 .col-sm-8 {
        text-align: center;
        margin-bottom: 10px;
    }

    .table-title h2 {
        font-size: 1.5rem;
    }
}

</style>
<body>
    <?php 
        include("partial/_dbconnect.php");
        include("partial/_nav.php");
    ?>

    <?php
        if($loggedin)
        {

    ?>

    <div class="container2" style="min-height: 430px;">
        <div class="table-wrapper" id="empty">
            <div class="table-title"  style="background: #f2f2f2;color:#4b2e0d">
                <div class="row4">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="" class="btn btn-primary">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            <span>Referesh List</span>
                        </a>
                        <a href="#" onclick="window.print();" class="btn btn-info">
                            <i class="fa-solid fa-print"></i>
                            <span>Print</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Address</th>
                        <th>Phone no.</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Items</th>
                        <!-- <th>Track</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT * FROM orders WHERE user_id='$userId'";
                        $result=mysqli_query($conn,$sql);

                        $counter=0;

                        while($row=mysqli_fetch_array($result))
                        {
                            $orderid=$row['order_id'];
                            $address=$row['address'];
                            $zipcode=$row['zip_code'];
                            $phoneno=$row['phone_no'];
                            $amount=$row['amount'];
                            $orderdate=$row['order_date'];
                            $payment_mode=$row['payment_mode'];

                            $orderststus=$row['order_status'];
                            $counter++;

                            echo'<tr>
                                    <td>'.$orderid.'</td>
                                    <td>'.substr($address,0,20).'...</td>
                                    <td>'.$phoneno.'</td>
                                    <td>'.$amount.'</td>
                                    <td>'.$payment_mode.'</td>
                                    <td>'.$orderdate.'</td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderStatus'.$orderid.'" class="view"><i class="fa-solid fa-arrow-right"></i></a></td>
                                    <td><a href="#" data-toggle="modal" title="viewDetails" data-target="#orderItem'.$orderid.'" class="view"><i class="fa-solid fa-arrow-right"></i></a></td> 
                                     </tr>';
                                //     <td><a href="http://localhost:3001/" title="viewDetails" class="view"><i class="fa-solid fa-arrow-right"></i></a></td> 
                                // </tr>';
                        }

                        if($counter==0)
                        {
                            ?><script> document.getElementById("empty").innerHTML='<div class="col-md-12 my-5" style="color:#4b2e0d;"><div class="card5"><div class="card-body cart"><div class="col-sm-12 mt-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not ordered any items.</strong></h3><h4>Please order to make me happy :)</h4> <a href="index.php" class="btn cart-btn-transform m-3" data-abc="true" style="background:#7d6f69;color:white;border-radius:10px;">Continue Shopping</a> </div></div></div></div>'</script>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <?php
        }
        else
        {
            echo'<div class="container" style="min-height:610px">
                    <div class="alert alert-info my-3">
                    <font style="font-size:22px;"><center>Check Your Order. You Need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
                    </div>
                </div>';
        }
    ?>
    <?php
        include("partial/_orderItemModal.php");
        include("partial/_orderStatusModal.php");
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>