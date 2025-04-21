<?php include("partial/session_check.php"); ?>

<?php
include("partial/_dbconnect.php");

if (isset($_GET['submitSearch']) && !empty($_GET['search'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM food_type WHERE food_name LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $is_veg = $row['is_veg'];
            echo '<div class="food-flex">
                    <div class="food-image-container" style="position:relative;">
                    <div class="food-symbol" style="position: absolute; top: 10px; left: 10px; font-size: 24px; z-index: 2;">';

                    if ($is_veg == 'Veg') 
                    {
                        echo '<i class="fa-solid fa-circle" style="color:green; background:white; padding:2px; border:2px solid green;"></i>';
                    } else {
                        echo '<i class="fa-solid fa-circle" style="color:red; background:white; padding:2px; border:2px solid red;"></i>';
                    }

                    echo '</div>
                <img src="/cafe_management_system/img/' . $row['food_img'] . '" alt="Food image" class="food-image">
                </div>
                <div class="food-details-container">
                    <h3 class="food-title">' . $row['food_name'] . '</h3>
                    <p class="price">Rs. ' . $row['food_price'] . '/-</p>
                    <p class="description">' . $row['food_desc'] . '</p>
                    <div class="food-actions">';

            if (isset($loggedin) && $loggedin == true) {
                $food_id = $row['food_id'];
                $userId = $_SESSION['userId'];
                $quasql = "SELECT item_quantity FROM cart WHERE food_id = '$food_id' AND user_id = '$userId'";
                $quaresult = mysqli_query($conn, $quasql);
                $quarow = mysqli_num_rows($quaresult);

                if ($quarow == 0) {
                    echo '<form action="/cafe_management_system/partial/_manageCart.php" method="POST">
                            <input type="hidden" name="itemId" value="' . $row['food_id'] . '">
                            <button type="submit" name="addtocart" class="btn">Add to Cart</button>
                        </form>';
                } else {
                    echo '<a href="viewCart.php"><button class="btn">Go to Cart</button></a>';
                }
            } else {
                echo '<button class="btn" data-toggle="modal" data-target="#loginModal">Add to Cart</button>';
            }

            echo '</div>
                    <div class="icon-links">
                        <a href="view-food-list.php?catid=' . $row['category_id'] . '">
                            <i class="fas fa-utensils"></i> All Foods
                        </a>
                        <a href="index.php">
                            <i class="fas fa-list"></i> All Categories
                        </a>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo "<p class='alert alert-warning'>No results found for '<b>" . $searchQuery . "</b>'</p>";
    }
} else {
    echo "<p class='alert alert-info'>Please enter a Food name to search.</p>";
}
?>
