<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>
</head>

<body>
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="partial/_manageCart.php" method="post" id="checkoutForm">
                        <div class="form-group">
                            <b><label for="address">Address:</label></b>
                            <input type="text" name="address" id="address" class="form-control" placeholder="1234 Main St" required minlength="3" maxlength="500">
                        </div>

                        <div class="form-group">
                            <b><label for="address1">Address Line 2:</label></b>
                            <input type="text" name="address1" id="address1" class="form-control" placeholder="Mear St,Surat,Gujarat">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+91</span>
                                    </div>
                                    <input type="tel" name="phoneno" id="phoneno" class="form-control" placeholder="XXXXXXXXXX" required pattern="[0-9]{10}" maxlength="10">
                                </div>
                            </div>

                            <div class="form-group col-md-6 mb-0">
                                <b><label for="zipcode">Zipcode:</label></b>
                                <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="XXXXXX" required pattern="[0-9]{6}" maxlength="6">
                            </div>
                        </div>

                        <div class="form-group">
                            <b><label for="password">Password:</label></b>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required maxlength="21" minlength="4" data-toggle="password">
                        </div>

                        <div class="form-group">
                            <label><input type="radio" name="payment_mode" value="COD" id="codModal"> Cash on Delivery</label><br>
                            <label><input type="radio" name="payment_mode" value="ONLINE" id="onlineModal"> Online Payment</label>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="hidden" name="amount" value="<?php echo $totalprice; ?>">
                            <button type="submit" name="checkout" class="btn btn-success" onclick="return handleCheckout()">Order</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Inside your modal form -->
<script>
    function handleCheckout() {
        const selectedPayment = document.querySelector('input[name="payment_mode"]:checked');
        const totalAmount = <?php echo $totalprice; ?>;

        if (!selectedPayment) {
            alert("Please select a payment method.");
            return false;
        }

        const paymentMode = selectedPayment.value;

        if (paymentMode === "ONLINE") {
            const address = document.getElementById('address').value;
            const address1 = document.getElementById('address1').value;
            const phone = document.getElementById('phoneno').value;
            const zipcode = document.getElementById('zipcode').value;

            const params = new URLSearchParams({
                amount: totalAmount,
                address,
                address1,
                phone,
                zipcode
            });

            window.location.href = `http://localhost:5173/pay?${params.toString()}`;
            return false;
        }

        return true;
    }
</script>
