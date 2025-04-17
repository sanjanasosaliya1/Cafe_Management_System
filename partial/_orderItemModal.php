<?php
    $itemModelSql = "SELECT * FROM orders WHERE user_id = '$userId'";
    $itemModalResult = mysqli_query($conn,$itemModelSql);

    while($itemModalRow = mysqli_fetch_array($itemModalResult))
    {
        $orderId = $itemModalRow['order_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Item</title>
</head>
<body>
    <div class="modal fade" id="orderItem<?php echo $orderId; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderId ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderItem<?php echo $orderId; ?>">Order Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="container2">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text">
                                    <thead>
                                        <tr>
                                            <th class="border-0 bg-light" scope="col">
                                                <div class="px-3" style="color: #4b2e0d;">Item</div>
                                            </th>
                                            <th class="border-0 bg-light" scope="col">
                                                <div class="text-center" style="color: #4b2e0d;">Quantity</div>
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
                                                $is_veg = $itemrow['is_veg'];

                                                echo '<tr>
                                                        <th scope="row">
                                                            <div class="p-2" style="position:relative;">
                                                                <img src="/cafe_management_system/img/'.$food_img.'" alt="" class="img-fluid" rounded shadow-sh>
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <div class="food-title-container" style="display: flex; align-items: center;">
                                                                        <h5 class="mb-0">
                                                                            <a href="#" class="text-dark d-inline-block align-middle">'.$food_name.'</a>
                                                                        </h5>';

                                                                        echo '<div class="food-symbol" style="font-size: 24px; margin-left: 10px;">';
                                                                        if ($is_veg == 'Veg') {
                                                                            echo '<i class="fa-solid fa-circle" style="color:green; background:white; padding:2px; border:2px solid green;"></i>';
                                                                        } else {
                                                                            echo '<i class="fa-solid fa-circle" style="color:red; background:white; padding:2px; border:2px solid red;"></i>';
                                                                        }
                                                                        echo '</div>
                                                                    </div>
                                                                    <span class="text-muted font-weight-normal font-italic d-block">Rs.'.$price.'/-</span>
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
