<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Cart</title>
    <link rel="icon" href="assets/img/Logo.jpg" type="image/x-icon">

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
    if ($loggedin) {
    ?>

        <div class="container3" id="cont">
            <div class="row3">

                <div class="col-lg-12 text-center border rounded my-3" style="color: #4b2e0d;background:none;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="cart_logo">
                            <path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                        My Cart</h1>
                </div>

                <div class="col-lg-8">
                    <div class="card3 wish-list mb-3">
                    <div class="table-responsive">
                        <table class="table text-center" style="width: 100%;">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">
                                        <form action="partial/_manageCart.php" method="post">
                                            <button name="removeAllItem" class="btn btn-sm" style="background: rgb(229, 63, 60);color:white;width:100px;">Remove All</button>
                                            <input type="hidden" name="userId" value="<?php $userId = $_SESSION['userId'];
                                                                                        echo $userId; ?>">
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM cart WHERE user_id = '$userId'";

                                $result = mysqli_query($conn, $sql);

                                $counter = 0;
                                $totalprice = 0;

                                while ($row = mysqli_fetch_array($result)) {
                                    $foodId = $row['food_id'];
                                    $quantity = $row['item_quantity'];

                                    $mysql = "SELECT * FROM food_type WHERE food_id = $foodId";

                                    $myresult = mysqli_query($conn, $mysql);

                                    $myrow = mysqli_fetch_array($myresult);

                                    $foodname = $myrow['food_name'];
                                    $foodprice = $myrow['food_price'];
                                    $total = $foodprice * $quantity;
                                    $counter++;
                                    $totalprice += $total;

                                    echo '<tr>
                                            <td> ' . $counter . ' </td>
                                            <td> ' . $foodname . '</td> 
                                            <td> ' . $foodprice . '</td>
                                            <td>
                                                <form id = "frm' . $foodId . '">
                                                    <input type="hidden" name="foodid" value="' . $foodId . '">
                                                    <input type="number" name="quantity" value="' . $quantity . '" class="text-center" onkeyup="return false" onchange="updateCart(' . $foodId . ')" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td><form method="post" action="partial/_manageCart.php">
                                                    <button name="removeItem" class="btn3 btn-sm btn-outline-danger">Remove</button>
                                                    <input type="hidden" name="itemId" value="' . $foodId . '">
                                                </form>
                                            </td>
                                        </tr>';
                                }

                                if ($counter == 0) {
                                ?>
                                    <script>
                                        document.getElementById('cont').innerHTML = '<div class="col-md-12 my-5"><div class="card3"><div class="card-body cart3"><div class="col-sm-12 empty-cart-cls text-center"><img src="https://i.imgur.com/dCdflKN.png" width="130px" height="130px" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Emppty</strong></h3><h4>Add Something to Make Me Happy :)</h4><a href="index.php" class="btn cart-btn-transform m-3" data-abc="true">Continue Shopping</a></div></div></div></div>';
                                    </script>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card3 wish-list mb-3">
                        <div class="pt-4 border bg-light rounded p-3">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order Summery</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price <span>Rs.<?php echo $totalprice; ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Shipping <span>Rs.0</span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">
                                    <div><strong>Total Amount Of</strong><strong>
                                            <p class="mb-0">(including Tax and Charges)</p>
                                        </strong></div><span><strong>Rs.<?php echo $totalprice; ?></strong></span>
                                </li>
                            </ul>
                            <div class="form-check">
                                <input type="radio" name="payment_method_main" id="codMain" class="form-check-input" value="COD" checked>
                                <label for="codMain" class="form-check-label">Cash On Delivery</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="payment_method_main" id="onlineMain" class="form-check-input" value="ONLINE">
                                <label for="onlineMain" class="form-check-label">Online Payment</label>
                            </div>

                            <br>

                            <button class="btn btn-block" type="button" data-toggle="modal" data-target="#checkoutModal">Go To Checkout</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="pt-4">
                            <a href="#collapseExample" class="dark-grey-text d-flex justify-content-between" style="text-decoration: none; color:#050607;" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Add a Discount Code(optional)<span><i class="fas fa-chevron-down pt-1"></i></span></a>

                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" name="" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        echo '<div class="container" style="min-height:570px;">
                    <div class="alert alert-info my-3">
                        <font style="font-size:22px">
                            <center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal" style="cursor:pointer;">Login</a></strong>
                            </center>
                        </font>
                    </div>
                </div>';
    }
    ?>

    <?php
    require("partial/_checkoutModal.php");
    require("partial/_footer.php");
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }

        function updateCart(id) {
            $.ajax({
                url: 'partial/_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function(res) {
                    location.reload();
                }
            })
        }

        $('#checkoutModal').on('show.bs.modal', function() {
            const selected = document.querySelector('input[name="payment_method_main"]:checked');
            if (selected) {
                const val = selected.value;
                document.getElementById("codModal").checked = val === "COD";
                document.getElementById("onlineModal").checked = val === "ONLINE";
            }
        });
    </script>

</body>

</html>