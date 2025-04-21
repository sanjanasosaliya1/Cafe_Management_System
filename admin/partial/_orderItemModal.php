<?php
    $itemModelSql = "SELECT * FROM orders";
    $itemModalResult = mysqli_query($conn,$itemModelSql);

    while($itemModalRow = mysqli_fetch_array($itemModalResult))
    {
        $orderId = $itemModalRow['order_id'];
        $userId = $itemModalRow['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order item</title>
</head>
<body>
    <div class="modal fade" id="orderItem<?php echo $orderId; ?>" tab-index="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderId ?>" aria-hidden="true" style="width:-webkit-fill-available;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: rgb(99, 85, 78);color:white;font-weight:bold;">
                    <h5 class="modal-title" id="orderItem<?php echo $orderId; ?>">Order Items (<b>Order Id: <?php echo $orderId; ?></b>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body" style="background: #e9e9e9;">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text">
                                    <thead>
                                        <tr>
                                            <th class="border-0" scope="col">
                                                <div class="px-3">Item</div>
                                            </th>
                                            <th class="border-0" scope="col">
                                                <div class="text-center">Quantity</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $mysql = "SELECT * FROM order_item WHERE order_id = '$orderId'";
                                            $myresult = mysqli_query($conn,$mysql);

                                            while($myrow = mysqli_fetch_array($myresult))
                                            {
                                                $foodid = $myrow['food_id'];
                                                $itemquantity = $myrow['item_quantity'];

                                                $itemsql = "SELECT * FROM food_type WHERE food_id = '$foodid'";

                                                $itemresult = mysqli_query($conn,$itemsql);

                                                $itemrow = mysqli_fetch_array($itemresult);

                                                $food_name = $itemrow['food_name'];
                                                $price = $itemrow['food_price'];
                                                $desc = $itemrow['food_desc'];
                                                $categoryid = $itemrow['category_id'];
                                                $food_img = $itemrow['food_img'];

                                                echo '<tr>
                                                        <th scope="row">
                                                            <div class="p-2">
                                                                <img src="/cafe_management_system/img/'.$food_img.'" alt="" width="70" class="img-fluid" rounded shadow-sh>
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <h5 class="mb-0"><a href="#" class="text-dark d-inline-block align-middle">'.$food_name.'</a></h5><span class="text-muted font-weight-normal font-italic d-block">Rs.'.$price.'/-</span>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td class="align-middle text-center"><strong>'.$itemquantity.'</strong></td>
                                                    </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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