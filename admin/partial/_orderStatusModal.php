<?php
$statusmodalsql = "SELECT * FROM orders";
$statusmodalresult = mysqli_query($conn, $statusmodalsql);

while ($statusmodalrow = mysqli_fetch_array($statusmodalresult)) 
{
    $orderid = $statusmodalrow['order_id'];
    $userid = $statusmodalrow['user_id'];
    $status = $statusmodalrow['order_status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>

    <link rel="stylesheet" href="admin/assetesForSideBar/css/styles.css">
</head>
<body>
    <div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:rgb(99, 85, 78);color:white;font-weight:bold;">
                    <h5 class="modal-title" id="orderStatus<?php echo $orderid; ?>">Order Status and Delivery Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body" style="background: #e9e9e9;">
                    <form action="partial/_orderManage.php" method="post" style="border-bottom: 2px solid rgb(86, 61, 32);">
                        <div class="text-left my-2">
                            <b><label for="status">Order Status:</label></b>
                            <div class="row mx-2">
                            <select name="status" id="status<?php echo $orderid; ?>" data-status="<?php echo $status; ?>" required onchange="updateStatusOptions('<?php echo $orderid; ?>')">
                                <option value="Order Placed" <?php echo ($status == 'Order Placed') ? 'selected' : ''; ?> data-order="0">Order Placed</option>
                                <option value="Order Confirmed" <?php echo ($status == 'Order Confirmed') ? 'selected' : ''; ?> data-order="1">Order Confirmed</option>
                                <option value="Preparing Your Order" <?php echo ($status == 'Preparing Your Order') ? 'selected' : ''; ?> data-order="2">Preparing Your Order</option>
                                <option value="Your Order is On The Way" <?php echo ($status == 'Your Order is On The Way') ? 'selected' : ''; ?> data-order="3">Your Order is On The Way</option>
                                <option value="Order Delivered" <?php echo ($status == 'Order Delivered') ? 'selected' : ''; ?> data-order="4">Order Delivered</option>
                                <option value="Order Denied" <?php echo ($status == 'Order Denied') ? 'selected' : ''; ?> data-order="5">Order Denied</option>
                                <option value="Order Cancelled" <?php echo ($status == 'Order Cancelled') ? 'selected' : ''; ?> data-order="6">Order Cancelled</option>
                            </select>

                            </div>
                        </div>

                        <input type="hidden" name="orderId" id="orderId" value="<?php echo $orderid; ?>">
                        <button type="submit" class="btn btn_form" name="updateStatus">Update</button>
                    </form>

                    <?php
                        $deliverydetailsql = "SELECT * FROM delivery_details WHERE order_id = '$orderid'";
                        $deliverydetailresult = mysqli_query($conn, $deliverydetailsql);

                        if ($deliverydetailrow = mysqli_fetch_array($deliverydetailresult)) 
                        {
                            $trackId = $deliverydetailrow['delivery_id'];
                            $deliveryboyname = $deliverydetailrow['delivery_boy_name'];
                            $phoneno = $deliverydetailrow['delivery_boy_phoneno'];
                            $deliverytime = $deliverydetailrow['delivery_time'];
                        } 
                        else 
                        {
                            $trackId = '';
                            $deliveryboyname = '';
                            $phoneno = '';
                            $deliverytime = '';
                        }

                        if ($status == 'Order Confirmed' || $status == 'Preparing Your Order' || $status == 'Your Order is On the Way' || $status == 'Order Delivered') 
                        {
                    ?>

                    <form action="partial/_orderManage.php" method="post">
                        <div class="text-left my-2">
                            <b><label for="name">Delivery Boy Name:</label></b>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $deliveryboyname; ?>" required>
                        </div>

                        <div class="text-left my-2 row">
                            <div class="form-group col-md-6">
                                <b><label for="phone">Delivery Boy Phone Number:</label></b>
                                <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $phoneno; ?>" required pattern="[0-9]{10}">
                            </div>
                            <div class="form-group col-md-6">
                                <b><label for="time">Estimated Time (minutes):</label></b>
                                <input type="number" name="time" id="time" class="form-control" value="<?php echo $deliverytime; ?>" min="1" max="120" required>
                            </div>
                        </div>

                        <input type="hidden" name="trackId" id="trackId" value="<?php echo $trackId; ?>">
                        <input type="hidden" name="orderId" id="orderId" value="<?php echo $orderid; ?>">

                        <button type="submit" class="btn btn_form" name="updateDeliveryDetails">Update</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
</body>
<script>
    $(function () 
    {
        $('[data-toggle="popover"]').popover();
    });
</script>

<script>
function updateStatusOptions(orderId) {
    let selectElement = document.getElementById("status" + orderId);
    let options = selectElement.options;
    let selectedIndex = selectElement.selectedIndex;
    let selectedOrder = parseInt(options[selectedIndex].getAttribute("data-order"));
    let orderStatus = selectElement.getAttribute("data-status"); 

    for (let i = 0; i < options.length; i++) {
        let optionOrder = parseInt(options[i].getAttribute("data-order"));

        if (orderStatus !== 'Order Placed' && (optionOrder === 5 || optionOrder === 6)) {
            options[i].disabled = true;
        }
        else if (optionOrder === 5 || optionOrder === 6) {
            options[i].disabled = false;
        }
        else if (optionOrder === selectedOrder + 1) {
            options[i].disabled = false;
        } 
        else {
            options[i].disabled = (optionOrder !== selectedOrder);
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    <?php
    $statusmodalresult = mysqli_query($conn, $statusmodalsql);
    while ($statusmodalrow = mysqli_fetch_array($statusmodalresult)) {
        echo "updateStatusOptions('{$statusmodalrow['order_id']}');";
    }
    ?>
});




</script>
</html>
