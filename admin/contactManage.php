<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manage</title>

    <link rel = "icon" href ="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type = "image/x-icon">

    <link rel="stylesheet" href="admin/assetesForSideBar/css/styles.css">

</head>
<body style="background-color: #fdf8f3;">
    <div class="alert alert-dismissible fade show" role="alert" style="width: 100%;" id="notempty">
        <strong>Info!</strong>If problem is not releted to the order then order id = 0. 
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span></button>
    </div>
    <div style="margin-right:32px; display:table; margin-left: auto;">
        <button type="button" class="btn btn-danger-gradiant text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history">
            <span>HISTORY <i class="ti-arrow-right"></i></span>
        </button>
    </div>
    <div class="container-fluid" id="empty">
        <div class="row">
            <div class="card col-lg-12" style="background-color: rgb(225, 221, 220);width:100%;">
                <div class="card-body">
                    <table class="table-striped table-bordered col-md-12 text-center">
                        <thead style="background-color:rgb(99, 85, 78); color:white;">
                            <tr>
                                <th>Contact Id</th>
                                <th>User Id</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                                <th>Order Id</th>
                                <th>Message</th>
                                <th>Date-Time</th>
                                <th>Reply</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM contact";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    $contactId = $row['contact_id'];
                                    $userId = $row['user_id'];
                                    $email = $row['email'];
                                    $phoneNo = $row['phone_no'];
                                    $orderId = $row['order_id'];
                                    $message = $row['message'];
                                    $time = $row['time'];
                                    $count++;
    
                                    echo '<tr class="trdisplay">
                                            <td>' .$contactId. '</td>
                                            <td>' .$userId. '</td>
                                            <td>' .$email. '</td>
                                            <td>' .$phoneNo. '</td>
                                            <td>' .$orderId. '</td>
                                            <td>' .$message. '</td>
                                            <td>' .$time. '</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm" type="button" data-toggle="modal" data-target="#reply' .$contactId. '">Reply</button>
                                            </td>
                                        </tr>';
                                }
                                if($count == 0)
                                {
                                    ?>
                                    <script>
                                        document.getElementById("notempty").innerHTML = '<div class="alert alert-dismissible fade show" role="alert" style="width:100%;background-color:rgb(250, 250, 250);"> You have not receive any message! </div>';
                                        document.getElementById("empty").innerHTML = '';
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

    <?php 
        $contactsql = "SELECT * FROM contact";
        $contactResult = mysqli_query($conn, $contactsql);
        while($contactRow = mysqli_fetch_array($contactResult))
        {
            $contactId = $contactRow['contact_id'];
            $Id = $contactRow['user_id'];
    ?>

    <!-- Reply Modal -->
    <div class="modal fade" id="reply<?php echo $contactId; ?>" tabindex="-1" role="dialog" aria-labelledby="reply<?php echo $contactId; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(99, 85, 78);color:white;font-weight:bold;">
            <h5 class="modal-title" id="reply<?php echo $contactId; ?>">Reply (Contact Id: <?php echo $contactId; ?>)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="background-color: #e9e9e9;">
            <form action="partial/_contactManage.php" method="post">
                <div class="text-left my-2">
                    <b><label for="message">Message: </label></b>
                    <textarea class="form-control" id="message" name="message" rows="2" required minlength="5"></textarea>
                </div>
                <input type="hidden" id="contactId" name="contactId" value="<?php echo $contactId; ?>">
                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                <button type="submit" class="btn" name="contactReply">Reply</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
        }
    ?>

    <!-- history Modal -->
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(99, 85, 78);color:white;font-weight:bold;">
              <h5 class="modal-title" id="history">Your Sent Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="notReply" style="background-color: #e9e9e9;">
            <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Reply Message</th>
                        <th>Date_Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM contact_reply"; 
                    $result = mysqli_query($conn, $sql);
                    $totalReply = 0;
                    while($row=mysqli_fetch_array($result)) {
                        $contactId = $row['contact_id'];
                        $message = $row['message'];
                        $datetime = $row['date_time'];
                        $totalReply++;

                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }    

                    if($totalReply==0) {
                      ?><script> document.getElementById("notReply").innerHTML = '<div class="alert alert-dismissible fade show" role="alert" style="width:100%;background-color:rgb(250, 250, 250);"> You have not Reply any message! </div>';</script> <?php
                    }   

                ?>
                </tbody>
		    </table>
            </div>
          </div>
        </div>
    </div>
</body>
</html>