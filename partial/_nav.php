<style>
    .nav_bg{
        background: #c6c0bd;
    }

    @keyframes rotate-bell {
        0%, 100% {
            transform: rotate(0deg);
        }
        25% {
            transform: rotate(10deg);
        }
        75% {
            transform: rotate(-10deg);
        }
    }

    .bell-rotate {
        animation: rotate-bell 0.8s ease-in-out infinite;
    }

    @media (max-width: 768px) {
    #notificationBtn {
        display: none !important;
    }
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
    session_start();
    include 'partial/_dbconnect.php';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true)
    {
        $loggedin = true;
        $userId = $_SESSION['userId'];
        $username = $_SESSION['username'];
    }
    else
    {
        $loggedin = false;
        $userId = 0;
    }

    $profilesql = "SELECT user_img FROM users WHERE user_id = '$userId'";
    $profileresult = mysqli_query($conn , $profilesql);
    $profilerow = mysqli_fetch_array($profileresult);


    echo '<nav class="navbar navbar-expand-lg navbar-dark nav_bg">
            <a class="navbar-brand" href="index.php"><img src="/cafe_management_system/assets/img/logo2.jpg" alt="" srcset="" style="height:50px;width:50px;background-color:white;border-radius:50%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" style="color:#4b2e0d">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#4b2e0d;">
                        Top Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background:#d8d2ce;color:#4b2e0d;">';
                        $sql = "SELECT category_name, category_id FROM categories";
                        $result = mysqli_query($conn , $sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<a class="dropdown-item" href="view-food-list.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
                        }    
                        echo '</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#4b2e0d" href="viewOrder.php">Your Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#4b2e0d" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#4b2e0d" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#4b2e0d" href="searchItems.php">Search</a>
                    </li>
                </ul>';

                $countsql = "SELECT SUM(item_quantity) FROM cart WHERE user_id=$userId";
                $countresult = mysqli_query($conn , $countsql);
                $countrow = mysqli_fetch_assoc($countresult);
                $count = $countrow['SUM(item_quantity)'];
                if(!$count)
                {
                    $count = 0;
                }

                    if ($loggedin) {
                        $eatlistSql = "SELECT * FROM eatlist WHERE user_id = $userId";
                        $eatlistResult = mysqli_query($conn, $eatlistSql);
                        $eatlistRow = mysqli_fetch_array($eatlistResult);

                        echo '<a href="viewCart.php">
                            <button type="button" class="btn-cart mx-2" title="MyCart">
                                <i class="fa-solid fa-cart-shopping" style="font-size:20px"></i>
                                <i class="bi bi-cart">('.$count.')</i>
                            </button>
                        </a>
                        <a href="viewEatList.php">
                                <button type="button" class="btn-cart mx-2" title="My Eatlist">';
                                if ($eatlistRow > 0) {
                                    echo '<i class="fa-solid fa-heart" style="color:red;font-size:21px;"></i>';
                                } else {
                                    echo '<i class="fa-regular fa-heart" style="color:#4b2e0d;font-size:21px;"></i>';
                                }
                        echo '</button>
                                </a>';
                    } else {
                    echo '<a href="viewEatList.php">
                            <button type="button" class="btn-cart mx-2" title="My Eatlist">
                                <i class="fa-regular fa-heart" style="color:#4b2e0d;font-size:21px;"></i>
                            </button>
                            </a>';
                    }
                
                    if($loggedin)
                    {
                        echo '                      
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" style="color:#4b2e0d">Welcome '.$username.'</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background:#d8d2ce;color:#4b2e0d">
                                    <a class="dropdown-item" href="partial/_logout.php">Logout</a>
                                    <a class="dropdown-item" href="partial/_delete.php" onclick="return confirm(&quot;Are you sure you want to delete your account?&quot;);">Delete Account</a>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center image-size-small position-relative">
                            <a href="viewProfile.php"><img src="/cafe_management_system/img/'.$profilerow['user_img'].'" class="rounded-circle" onError="this.src=\'img/profilePic.jpg\'" style="width:40px; height:40px"></a>

                        </div>
                       <div class="text-center image-size-small position-relative" style="margin-left:-9px;margin-top:-25px;">
                            <a href="#" id="notificationBtn" data-toggle="modal" data-target="#adminReply">
                                <i class="fa-solid fa-bell icon-badge-icon" style="font-size:25px;"><b><span id="notificationCount" style="font-size:10px;color:white;position:absolute;right:7px;top:5px">0</span></b></i>
                            </a>
                        </div>
                        ';
                    }
                    else
                    {
                        echo '
                            <button type="button" class="btn mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
                            <button type="button" class="btn mx-2" data-toggle="modal" data-target="#signupModal">Sign Up</button>';
                    }
            
            
    echo '</div> 
        </nav>';

    include 'partial/_loginModal.php';
    include 'partial/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background:#d8d2ce;">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background:#d8d2ce;">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background:#d8d2ce;">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background:#d8d2ce;">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>

<script src="/cafe_management_system/assets/js/main.js"></script>

<!-- Admin Reply Modal -->
<div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdf8f3">
                <h5 class="modal-title" id="adminReply">Admin Reply</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="messagebd" style="background-color:  #fdf8f3">
                <table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color:#7d6f69">
                        <tr>
                            <th>Contact Id</th>
                            <th>Reply Message</th>
                            <th>Date-Time</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: rgb(254, 254, 254);">
                        <?php
                            $userId=$_SESSION['userId'];
                            $sql = "SELECT * FROM contact_reply WHERE user_id='$userId'";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            while($row = mysqli_fetch_array($result))
                            {
                                $contactId = $row['contact_id'];
                                $message = $row['message'];
                                $dateTime = $row['date_time'];
                                $count++;

                                echo '<tr>
                                        <td>' .$contactId. '</td>
                                        <td>' .$message. '</td>
                                        <td>' .$dateTime. '</td>
                                    </tr>';
                            }
                            echo '<script>
                                   document.getElementById("notificationCount").innerHTML = "'.$count.'";
                            </script>';
                            if($count == 0)
                            {
                                ?>
                                <script>
                                    document.getElementById("messagebd").innerHTML = '<div class="my-1"> You have not received any messages. </div>';
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
<script>
document.addEventListener("DOMContentLoaded", function () {
    const notificationCountElement = document.getElementById("notificationCount");
    const bellIcon = document.querySelector("#notificationBtn i");

    function toggleBellRotation() 
    {
        bellIcon.classList.add("bell-rotate"); 

        setTimeout(function() {
            bellIcon.classList.remove("bell-rotate");
        }, 2000); 
    }

    setInterval(toggleBellRotation, 5000);
});

</script>

