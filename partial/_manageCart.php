<?php
    include("_dbconnect.php");

    session_start();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $userId = $_SESSION['userId'];
        
        if(isset($_POST['addtocart']))
        {
            $itemid = $_POST['itemId'];

            $existsql = "SELECT * FROM cart WHERE food_id = '$itemid' AND user_id = '$userId'";

            $result = mysqli_query($conn,$existsql);

            $existrow = mysqli_num_rows($result);

            if($existrow>0)
            {
                echo "<script>
                        alert('item already added');
                        window.history.back(1);
                    </script>";
            }
            else
            {
                $sql = "INSERT INTO cart(food_id,item_quantity,user_id,cart_added_date) VALUES ('$itemid','1','$userId',CURRENT_DATE)";
                $result = mysqli_query($conn,$sql);
                if($result)
                {
                    echo "<script>
                        window.history.back(1);
                    </script>";
                }
            }
        }

        if(isset($_POST['removeItem']))
        {
            $itemId=$_POST['itemId'];
            $sql="DELETE FROM cart WHERE food_id='$itemId' AND user_id='$userId'";
            $result=mysqli_query($conn,$sql);

            echo"<script>
                    alert('Removed!');
                    window.history.back(1);
                </script>";
        }

        if(isset($_POST['removeAllItem']))
        {
            $itemId=$_POST['itemId'];
            $sql="DELETE FROM cart WHERE user_id='$userId'";
            $result=mysqli_query($conn,$sql);

            echo"<script>
                    alert('Removed All!');
                    window.history.back(1);
                </script>";
        }

        if(isset($_POST['checkout']))
        {
            $amount=$_POST['amount'];
            $address1=$_POST['address'];
            $address2=$_POST['address1'];
            $phone=$_POST['phoneno'];  
            $zipcode=$_POST['zipcode'];
            $password=$_POST['password'];
            $mode=$_POST["payment_mode"];

            $address=$address1.",".$address2;

            $passSql="SELECT * FROM users WHERE user_id='$userId'";

            $passResult=mysqli_query($conn,$passSql);

            $passRow=mysqli_fetch_array($passResult);

            $userName=$passRow['user_name'];

            if($password==$passRow['user_password'])
            {
                $sql="INSERT INTO orders(user_id,address,zip_code,phone_no,amount,payment_mode,order_status,order_date) VALUES ('$userId','$address','$zipcode','$phone','$amount','$mode','Order Placed',CURRENT_DATE)";
                $result=mysqli_query($conn,$sql);

                $orderId=$conn->insert_id;

                if($result)
                {
                    $addSql="SELECT * FROM cart WHERE user_id='$userId'";
                    $addResult=mysqli_query($conn,$addSql);

                    while($addRow=mysqli_fetch_array($addResult))
                    {
                        $foodid=$addRow['food_id'];
                        $itemquantity=$addRow['item_quantity'];
                        $itemsql="INSERT INTO order_item(order_id,food_id,item_quantity) VALUES('$orderId','$foodid','$itemquantity')";
                        $itemResult=mysqli_query($conn,$itemsql);
                    }

                    $deleteSql="DELETE FROM cart WHERE user_id='$userId'";
                    $deleteResult=mysqli_query($conn,$deleteSql);

                    echo'<script>
                            alert("Thanks For odering with Us. Your order Id is'.$orderId.'");
                            window.location.href="/cafe_management_system/index.php";
                        </script>';
                        exit();
                }
                
            }
            else
            {
                echo'<script>
                        alert("Incorrect Password!! Please Enter Correct Password");
                        window.history.back(1);
                    </script>';
                    exit();
            }
        }

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest')
        {
            $foodId=$_POST['foodid'];
            $qty=$_POST['quantity'];
            $dateSql="UPDATE cart SET item_quantity='$qty' WHERE food_id='$foodId' AND user_id='$userId'";
            $updateResult=mysqli_query($conn,$dateSql);
        }
    }
?>

<?php
include("_dbconnect.php");

if ($_GET['status'] == 'success') {
    $userId = $_SESSION['userId'];
    
    $amount = $_GET['amount'];
    $address1 = $_GET['address'];
    $address2 = $_GET['address1'];
    $phone = $_GET['phone'];
    $zipcode = $_GET['zipcode'];

    $address = $address1 . ', ' . $address2;

    $passSql = "SELECT * FROM users WHERE user_id = '$userId'";
    $passResult = mysqli_query($conn, $passSql);
    $passRow = mysqli_fetch_array($passResult);

    if ($passRow) {
        $sql = "INSERT INTO orders (user_id, address, zip_code, phone_no, amount, payment_mode, order_status, order_date)VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', 'ONLINE', 'Order Placed', CURRENT_DATE)";
        $result = mysqli_query($conn, $sql);
        $orderId = $conn->insert_id;

        if ($result) {
            $cartSql = "SELECT * FROM cart WHERE user_id = '$userId'";
            $cartResult = mysqli_query($conn, $cartSql);

            while ($row = mysqli_fetch_array($cartResult)) {
                $foodId = $row['food_id'];
                $qty = $row['item_quantity'];
                $itemSql = "INSERT INTO order_item (order_id, food_id, item_quantity) VALUES ('$orderId', '$foodId', '$qty')";
                mysqli_query($conn, $itemSql);
            }

            $deleteSql = "DELETE FROM cart WHERE user_id = '$userId'";
            mysqli_query($conn, $deleteSql);

            echo "<script>
                alert('Payment successful! Your Order ID is $orderId');
                window.location.href='/cafe_management_system/index.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to place order after payment.');
                window.location.href='/cafe_management_system/viewCart.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('User data not found.');
            window.location.href='/cafe_management_system/viewCart.php';
        </script>";
    }
}
?>
