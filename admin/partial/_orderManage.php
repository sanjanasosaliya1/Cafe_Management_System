<?php
    include("_dbconnect.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['updateStatus']))
        {
            $orderId = $_POST['orderId'];
            $status = $_POST['status'];

            $sql = "UPDATE orders SET order_status = '$status' WHERE order_id = '$orderId'";

            $result = mysqli_query($conn,$sql);

            if($result)
            {
                echo "<script>
                        alert('Update Successfully');
                        window.location = document.referrer;
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Failed');
                        window.location = document.referrer;
                    </script>";
            }
        }
        if(isset($_POST['updateDeliveryDetails']))
        {
            $trackid = $_POST['trackId'];
            $orderId = $_POST['orderId'];
            $name = $_POST['name'];
            $time = $_POST['time'];
            $phone = $_POST['phone'];

            if($trackid == NULL)
            {
                $sql = "INSERT INTO delivery_details(order_id,delivery_boy_name,delivery_boy_phoneno,delivery_time,date_time) VALUES ('$orderId','$name','$phone','$time',current_timestamp())";

                $result = mysqli_query($conn,$sql);

                $trackid = $conn->insert_id;

                if($result)
                {
                    echo "<script>
                            alert('Update Successfully');
                            window.location = document.referrer;
                        </script>";
                }
                else
                {
                    echo "<script>
                            alert('Failed');
                            window.location = document.referrer;
                        </script>";
                }
            }
            else
            {
                $sql = "UPDATE delivery_details SET delivery_boy_name = '$name',delivery_boy_phoneno = '$phone', delivery_time = '$time', date_time = current_timestamp() WHERE delivery_id = '$trackid'";

                $result = mysqli_query($conn,$sql);

                if($result)
                {
                    echo "<script>
                            alert('Update Successfully');
                            window.location = document.referrer;
                        </script>";
                }
                else
                {
                    echo "<script>
                            alert('Failed');
                            window.location = document.referrer;
                        </script>";
                }
            }
        }
    }
?>