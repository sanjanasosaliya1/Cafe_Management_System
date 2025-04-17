<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>

    <link rel = "icon" href ="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type = "image/x-icon">

    <link rel="stylesheet" href="admin/assetesForSideBar/css/styles.css">
    <style>
        .card {
            width: 80%; 
            margin: auto; 
        }
    </style>    
</head>
<body style="background-color: #fdf8f3;">
    <?php
        $sql = "SELECT * FROM site";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $systemName = $row['system_name'];
        $address = $row['address'];
        $email = $row['email'];
        $contact = $row['contact']; 
        
    ?>
    <div class="container-fluid" style="margin-top:98px;">
        <div class="card col-lg-6 p-0">
            <div class="card-header" style="background-color: rgb(99, 85, 78); color:white;font-weight:bold;">
                <h4 class="text-center" style="margin-top: 8px;"><?php echo $systemName; ?></h4>
            </div>
            <div class="card-body">
                <form action="partial/_siteManage.php" method="post">
                    <div class="form-group">
                        <label for="name" class="control-label">System Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $systemName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Contact No.:</label>
                        <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
                    </div>
                    <div class="card-footer" style="background-color:rgb(99, 85, 78); ">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <button name="updateDetail" class="btnupdate btn">Save</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>