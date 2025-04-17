<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <title id="title">Category</title>
    <link rel = "icon" href ="assets/img/Logo.jpg" type = "image/x-icon">
    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

    <style>
        .sort-dropdown select {
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 0px 10px;
            background-color:rgb(95, 93, 92);
        }
        #sortDropdown {
            background: white;
            color: black; 
            padding: 0.5rem 1rem; 
            font-size: 1rem; 
            cursor: pointer; 
            text-align: center; 
            width: auto; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .sort-dropdown {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <?php 
        include("partial/_dbconnect.php");
        include("partial/_nav.php");
    ?>

    <div>&nbsp;
        <a href="index.php" class="active text-dark">
            <i class="fas fa-qrcode" style="color:#4b2e0d"></i>
            <span style="color:#4b2e0d">All Category</span>
        </a>

        <div class="sort-dropdown" class="btn2">
            <select id="sortDropdown" onchange="sortItems()">
                <option value="default" class="sort">Sort & Filter</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
                <option value="veg">Vegetarian</option>
                <option value="nonveg">Non-Vegetarian</option>
                <option value="allitem">All Items</option>
            </select>
        </div>
    </div>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM categories WHERE category_id = '$id'";

        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result))
        {
            $catname = $row['category_name'];
            $catdesc = $row['category_desc'];
            $pic = $row['category_img'];
        }
    ?>

    <div class="container2 my-3" id="cont">
        <div class="col-lg-4 text-center" style="margin: auto;border-top:2px groove black;border-bottom:2px groove black;color:#4b2e0d;">
            <h2 class="text-center center-container"><span id="catTitle">Items</span></h2>
        </div>

        <!-- Sorting Dropdown -->

        <div class="row" id="food-items-container">
        <?php
        $id = $_GET['catid'];

        $sortOption = isset($_GET['sortOption']) ? $_GET['sortOption'] : 'default';

        if ($sortOption == 'veg') {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id' AND is_veg = 'Veg'";
        } else if ($sortOption == 'nonveg') {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id' AND is_veg = 'Non-Veg'";
        } else if ($sortOption == 'price_asc') {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id' ORDER BY food_price ASC";
        } else if ($sortOption == 'price_desc') {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id' ORDER BY food_price DESC";
        } else if ($sortOption == 'allitem') {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id'";
        } 
        else {
            $sql = "SELECT * FROM food_type WHERE category_id = '$id'";
        }

        $result = mysqli_query($conn, $sql);
        $noresult = true;

        $result = mysqli_query($conn,$sql);
        $noresult = true;

        while($row = mysqli_fetch_array($result))
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

        echo '<div class="col-xs-3 col-sm-3 col-md-3 food-item" data-price="'.$food_price.'" data-veg="'.$is_veg.'">
                <div class="card2" style="position: relative;">
                    <div class="food-symbol" style="position: absolute; top: 10px; left: 10px; font-size: 24px; z-index: 2;">';

        if ($is_veg == 'Veg') {
            echo '<i class="fa-solid fa-circle" style="color:green; background:white; padding:2px; border:2px solid green;"></i>'; 
        } else {
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
                            <button type="submit" style="outline:none;" class=" heart float-right heart ' . ($is_favorite ? 'filled' : '') . '">
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
    if($noresult)
    {
        echo '<div class="jumbotron jumbotron-fluid" style="background:#d8d4d4;">
                <div class="container">
                    <p class="display-4">Sorry In This Category No Items Available </p>
                    <p class="lead">We Will Update Soon.</p>
                </div>
            </div>';
    }

?>

        </div>
    </div>

    <?php
        include("partial/_footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
    document.getElementById('title').innerHTML = "<?php echo $catname; ?>";
    document.getElementById('catTitle').innerHTML = "<?php echo $catname; ?>";

    const loggedin = <?php echo json_encode($loggedin); ?>;
    const userId = <?php echo json_encode($userId); ?>;
    
    function sortItems() {
        var sortOption = document.getElementById('sortDropdown').value;
        var foodItems = document.querySelectorAll('.food-item');

        window.location.href = "view-food-list.php?catid=<?php echo $id; ?>&sortOption=" + sortOption;
    }
    
</script>
</body>
</html>
