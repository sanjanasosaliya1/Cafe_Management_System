<?php
$statusmodalsql = "SELECT * FROM orders WHERE user_id = '$userId'";
$statusmodalresult = mysqli_query($conn, $statusmodalsql);

while ($statusmodalrow = mysqli_fetch_array($statusmodalresult)) 
{
    $orderid = $statusmodalrow['order_id'];
    $status = $statusmodalrow['order_status'];

    $trackId = 'xxxxx';
    $deliveryboyname = '';
    $phoneno = '';
    $deliverytime = 'xx';

    if ($status == 'Order Confirmed' || $status == 'Preparing Your Order' || $status == 'Your Order is On The Way' || $status == 'Order Delivered') 
    {
        $deliverydetailsql = "SELECT * FROM delivery_details WHERE order_id = '$orderid'";
        $deliverydetailresult = mysqli_query($conn, $deliverydetailsql);

        if ($deliverydetailrow = mysqli_fetch_array($deliverydetailresult)) 
        {
            $trackId = $deliverydetailrow['delivery_id'] ?? 'xxxxx';
            $deliveryboyname = $deliverydetailrow['delivery_boy_name'] ?? '';
            $phoneno = $deliverydetailrow['delivery_boy_phoneno'] ?? '';
            $deliverytime = $deliverydetailrow['delivery_time'] ?? 'xx';

            if ($status == 'Order Delivered') 
            {
                $deliverytime = 'xx';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order status</title>

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

    </head>
<body>
    <div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="odrerStatus<?php echo $orderid?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body" id="printThis">
                    <div class="container2" style="padding-right: 0px;padding-left:0px">
                        <article class="card5">
                            <div class="card-body">
                                <h6><strong>Order Id:</strong>#<?php echo $orderid; ?></h6>
                                <article class="card5">
                                    <div class="card-body row">
                                        <div class="col"><strong>Estimated Delivery Time:</strong><br><?php echo $deliverytime; ?>Minute</div>
                                        <div class="col"><strong>Shipping By:</strong><br><?php echo $deliveryboyname; ?>|<i class="fa fa-phone"></i><?php echo $phoneno; ?></div>
                                        <div class="col"><strong>Status:</strong><br><?php echo $status; ?></div>
                                        <div class="col"><strong>Tracking #:</strong><br><?php echo $trackId; ?></div>
                                    </div>
                                </article>
                                <div class="track">
                                    <?php
                                        if($status=='Order Placed')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-times"></i></span><span class="text">Order Confirmed</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-times"></i></span><span class="text">Preparing Your Order</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-truck"></i></span><span class="text">On The Way</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-box"></i></span><span class="text">Order Delivered</span></div>';
                                        }
                                        else if($status=='Order Confirmed')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Confirmed</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-times"></i></span><span class="text">Preparing Your Order</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-truck"></i></span><span class="text">On The Way</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-box"></i></span><span class="text">Order Delivered</span></div>';
                                        }
                                        else if($status=='Preparing Your Order')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Confirmed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Preparing Your Order</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-truck"></i></span><span class="text">On The Way</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-box"></i></span><span class="text">Order Delivered</span></div>';
                                        }
                                        else if($status=='Your Order is On The Way')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Confirmed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Preparing Your Order</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-truck"></i></span><span class="text">On The Way</span></div>
                                                <div class="step"><span class="icon"><i class="fa fa-box"></i></span><span class="text">Order Delivered</span></div>';
                                        }
                                        else if($status=='Order Delivered')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Confirmed</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Preparing Your Order</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-truck"></i></span><span class="text">On The Way</span></div>
                                                <div class="step active"><span class="icon"><i class="fa fa-box"></i></span><span class="text">Order Delivered</span></div>';
                                        }
                                        else if($status=='Order Denied')
                                        {
                                            echo '<div class="step active"><span class="icon"><i class="fa fa-check"></i></span><span class="text">Order Placed</span></div>
                                                <div class="step deactive"><span class="icon"><i class="fa fa-times"></i></span><span class="text">Order Denied</span></div>';
                                        }
                                        else
                                        {
                                            echo '<div class="step deactive"><span class="icon"><i class="fa fa-times"></i></span><span class="text">Order Cancelled</span></div>';
                                        }  
                                    ?>
                                </div>
                            </div>
                            <a href="contact.php" class="btn" data-abc="true" style="width: 20%;">Help <i class="fa fa-chevron-right"></i></a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>