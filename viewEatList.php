<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Eatlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="assets/img/Logo.jpg" type="image/x-icon">
</head>

<body>

    <?php
    include("partial/_dbconnect.php");
    include("partial/_nav.php");

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $userId = $_SESSION['userId'];

        $sql = "SELECT DISTINCT eatlist.*, food_type.*
            FROM eatlist 
            JOIN food_type ON eatlist.food_id = food_type.food_id 
            WHERE eatlist.user_id = '$userId'";

        $result = mysqli_query($conn, $sql);

    } 
    else {
        $notLoggedIn = true;
    }
    ?>

    <div class="container mt-5">
        <h2 style="text-align: center;"><i class="fas fa-heart" style="color:#7d6f69;font-size:23px;"></i> MY Eatlist</h2>

        <?php if (isset($notLoggedIn) && $notLoggedIn === true) { ?>
         
            <div class="col-lg-12" style="align-items: center; display:flex;justify-content:center;margin-top:50px;;margin-bottom:50px">
                <font style="font-size:22px;"><a class="alert-link" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;color:4b2e0d;font-weight:bold;">Login</a> to view your Eatlist</strong></font>
            </div>
                                            
        <?php } 
        else { ?>
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo '<div class="row">';
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $noresult = false;
                    $food_id = $row['food_id'];
                    $food_name = $row['food_name'];
                    $food_price = $row['food_price'];
                    $food_offer = $row['food_offer'];
                    $food_desc = $row['food_desc'];
                    $food_img = $row['food_img'];
                    $is_veg = $row['is_veg'];

                    $is_favorite = false;
                    if ($loggedin) {
                        $fav_sql = "SELECT * FROM eatlist WHERE user_id = '$userId' AND food_id = '$food_id'";
                        $fav_result = mysqli_query($conn, $fav_sql);
                        if (mysqli_num_rows($fav_result) > 0) {
                            $is_favorite = true;
                        }
                    }

                    echo '<div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="card2" style="position: relative;">
                                <div class="food-symbol" style="position: absolute; top: 10px; left: 10px; font-size: 24px; z-index: 2;">';

                    if ($is_veg == 'Veg') {
                        echo '<i class="fa-solid fa-circle" style="color:green; background:white; padding:2px; border:2px solid green;"></i>'; 
                    } 
                    else {
                        echo '<i class="fa-solid fa-circle" style="color:red; background:white; padding:2px; border:2px solid red;"></i>'; 
                    }

                    echo '</div>
                                <div class="food-symbol" style="position: absolute; top: 10px; right: 10px; font-size: 20px; z-index: 2;">';
                                 if ($loggedin) 
                    { 
                        echo '<form action="partial/_manageEatList.php" method="POST">
                            <input type="hidden" name="food_id" value="' . $food_id . '">
                            <input type="hidden" name="user_id" value="' . $userId . '">
                            <input type="hidden" name="action" value="' . ($is_favorite ? 'remove' : 'add') . '">
                            <button type="submit"style="outline:none;"  class=" heart float-right heart ' . ($is_favorite ? 'filled' : '') . '">
                                <span class="material-icons">' . ($is_favorite ? 'favorite' : 'favorite_border') . '</span>
                            </button>
                          </form>';
                    } 
                    else 
                    {
                        echo '<button style="outline:none;" class="material-icons heart float-right heart" data-toggle="modal" data-target="#loginModal">
                        <span class="material-icons">favorite_border</span>
                  </button>';
                    }
                                
                                echo '</div>
                                <img src="/cafe_management_system/img/'.$food_img.'" alt="image" width="249px" height="270px">
                                
                                <div class="card-body">
                                    <h5 class="card-title">'.substr($food_name,0,20).'...</h5>
                                    <div style="display: flex; align-items: center;justify-content:space-between;margin-left:20px;margin-right:20px;">
                                        <h6 style="color:grey; text-decoration: line-through; font-weight: bold;">Rs.'.$food_offer.'/-</h6>
                                        <h6 style="color:green;font-weight:bold;">Rs.'.$food_price.'/-</h6>
                                    </div>

                                    <p class="card-text">'.substr($food_desc,0,29).'...</p>
                                    
                                    <div class="row2 justify-content-center">';
                                    if($loggedin){
                                        $quasql = "SELECT item_quantity FROM cart WHERE food_id = '$food_id' AND user_id = '$userId'";

                                        $quaresult = mysqli_query($conn,$quasql);

                                        $quarow = mysqli_num_rows($quaresult);

                                        if($quarow == 0)
                                        {
                                            echo '<form action="/cafe_management_system/partial/_manageCart.php" method = "POST">
                                                    <input type="hidden" name="itemId" value="'.$food_id.'">
                                                    <button type="submit" name="addtocart" class="btn2 mx-2">Add to Cart</button>
                                            </form>';
                                        }
                                        else
                                        {
                                            echo '<a href = "viewCart.php"><button class="btn2 mx-2">Go to Cart</button></a>';
                                        }
                                    }
                                    else
                                    {
                                        echo '<button class="btn2 mx-2" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                                    }
                                    echo '</form>
                                        <a href="view-food.php?foodid='.$food_id.'" class="mx-2"><button class="btn2">Quick View</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            } else {
                echo '<p style="text-align:center;">Your Eatlist is empty. Add some items!</p>';
            }
            ?>
            
        <?php } ?>
    </div>

    <?php include("partial/_footer.php"); ?>

    <script>
    const loggedin = <?php echo json_encode($loggedin); ?>;
    const userId = <?php echo json_encode($userId); ?>;
</script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>
