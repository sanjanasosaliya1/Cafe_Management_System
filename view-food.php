<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Food</title>
    <link rel="icon" href="assets/img/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
    <style>
        .food-flex {
            position: relative; 
        }

        .heart {
            position: absolute;
            top: 20px;
            right: 16px;
        }
    </style>
</head>
<body>

<?php 
    include("partial/_dbconnect.php");
    include("partial/_nav.php"); 
?>

<div class="my-4" id="cont2">
    <div class="row food-flex-container">
        <?php
            $foodid = $_GET['foodid'];
            $sql = "SELECT * FROM food_type WHERE food_id = '$foodid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            $food_id = $row['food_id'];
            $food_name = $row['food_name'];
            $food_price = $row['food_price'];
            $food_desc = $row['food_desc'];
            $food_img = $row['food_img'];
            $category_id = $row['category_id'];

             $is_favorite = false;
            if ($loggedin) {
                $fav_sql = "SELECT * FROM eatlist WHERE user_id = '$userId' AND food_id = '$food_id'";
                $fav_result = mysqli_query($conn, $fav_sql);
                if (mysqli_num_rows($fav_result) > 0) {
                    $is_favorite = true;
                }
            }
        ?>

        <script>
            document.getElementById('title').innerHTML = "<?php echo $food_name;?>";
        </script>

        <div class="food-flex">
            <div class="food-image-container">
                <img src="/cafe_management_system/img/<?php echo $food_img; ?>" alt="Food image" class="food-image">
            </div>

            <div class="food-details-container">
                <h3 class="food-title">
                    <?php echo $food_name; ?>
                </h3>

                <?php if ($loggedin) { ?>
        <form action="partial/_manageEatList.php" method="POST" class="heart-form">
            <input type="hidden" name="food_id" value="<?php echo $food_id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
            <input type="hidden" name="action" value="<?php echo $is_favorite ? 'remove' : 'add'; ?>">
            <button type="submit" style="outline:none;" class="heart <?php echo $is_favorite ? 'filled' : ''; ?>">
                <span class="material-icons"><?php echo $is_favorite ? 'favorite' : 'favorite_border'; ?></span>
            </button>
        </form>
    <?php } else { ?>
        <button style="outline:none;" class="material-icons heart" data-toggle="modal" data-target="#loginModal">
            favorite_border
        </button>
    <?php } ?>

                <p class="price" style="color: green;">Rs. <?php echo $food_price; ?>/-</p>
                <p class="description"><?php echo $food_desc; ?></p>

                <div class="food-actions">
                    <?php
                        if ($loggedin) {
                            $quasql = "SELECT item_quantity FROM cart WHERE food_id = '$food_id' AND user_id = '$userId'";
                            $quaresult = mysqli_query($conn, $quasql);
                            $quarow = mysqli_num_rows($quaresult);

                            if ($quarow == 0) {
                                echo '<form action="/cafe_management_system/partial/_manageCart.php" method="POST">
                                        <input type="hidden" name="itemId" value="'.$food_id.'">
                                        <button type="submit" name="addtocart" class="btn">Add to Cart</button>
                                    </form>';
                            } else {
                                echo '<a href="viewCart.php"><button class="btn">Go to Cart</button></a>';
                            }
                        } else {
                            echo '<button class="btn" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
                        }
                    ?>
                </div>

                <div class="icon-links">
                    <a href="view-food-list.php?catid=<?php echo $category_id; ?>">
                        <i class="fas fa-utensils"></i> All Foods
                    </a>
                    <a href="index.php">
                        <i class="fas fa-list"></i> All Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("partial/_footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script>
    const loggedin = <?php echo json_encode($loggedin); ?>;
    const userId = <?php echo json_encode($userId); ?>;
</script>
<script src="/cafe_management_system/assets/js/main.js"></script>

</body>
</html>