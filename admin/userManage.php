<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel = "icon" href ="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type = "image/x-icon">

    <style>
    .card{
        width: 100%;
        background-color: rgb(225, 221, 220);
    }
</style>
    
</head>
<body>
    <div class="container-fluid" style="margin-top: 98px;">
        <div class="row">
            <div class="card" style="background-color: rgb(225, 221, 220);width:100%">
                <div class="card-body">
                    <table class="table-striped table-bordered col-md-12 text-center">
                        <thead style="background-color: rgb(99, 85, 78); color:white">
                            <tr>
                                <th>UserId</th>
                                <th style="width:7%;">Profile Pic</th>
                                <th>UserName</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn , $sql);
                                while($row = mysqli_fetch_array($result))
                                {
                                    $userId = $row['user_id'];
                                    $username = $row["user_name"];
                                    $firstname = $row["firstname"];
                                    $lastname = $row["lastname"];
                                    $email = $row["user_email"];
                                    $phone = $row["user_phone"];
                                    $usertype = $row["user_type"];
                                    $profile = $row['user_img'];

                                    echo '<tr>
                                            <td>'.$userId.'</td>';
                                            if($usertype == "admin")
                                            {
                                               echo '<td><img src="/cafe_management_system/img/profilePic.jpg" alt="image for this user" width="100px" height="100px"></td>';
                                            }
                                            else
                                            {
                                               echo '<td><img src="/cafe_management_system/img/'.$profile.'" alt="image for this user" width="100px" height="100px"></td>';
                                            }
                                             echo '<td>'.$username.'</td>
                                            <td>
                                                <p>First Name: <b>'.$firstname.'</b></p>
                                                <p>Last Name: <b>'.$lastname.'</b></p>
                                            </td>
                                            <td>'.$email.'</td>
                                            <td>'.$phone.'</td>
                                            <td>'.$usertype.'</td>
                                            <td class="text-center">
                                                <div class="row mx-auto" style="width:112px;">';
                                                    if($usertype == "admin")
                                                    {
                                                        echo '<button class="btn btn-sm btn-danger" disabled style="margin-left:9px;cursor:pointer;">De-Activate</button>';
                                                    }
                                                    else
                                                    {
                                                        echo '<form action="/cafe_management_system/admin/partial/_userManage.php" method="POST">
                                                                <button name="removeUser" class="btn2 btn-sm btn-danger" style="margin-left:9px;cursor:pointer;" onclick="return confirm(\'Are You Sure You Want to Delete?\')">De-Activate</button>
                                                                <input type="hidden" name="userId" value="'.$userId.'">
                                                            </form>';
                                                    }
                                            echo  '</div>
                                            </td>
                                        </tr>';
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