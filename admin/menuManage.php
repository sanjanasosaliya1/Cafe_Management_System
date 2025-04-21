<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="icon" href="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="admin/assetesForSideBar/css/styles.css">
</head>

<body>
    <div class="container-fluid" style="margin-top: 98px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <form action="/cafe_management_system/admin/partial/_menuManage.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header" style="background-color: rgb(99, 85, 78);color:white;font-weight:bold;">
                                Create New Item
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Name: </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Description: </label>
                                    <textarea class="form-control" name="description" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price: </label>
                                    <input type="number" class="form-control" name="offerprice" required min="1">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Offer Price: </label>
                                    <input type="number" class="form-control" name="price" required min="1">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Category: </label>
                                    <select name="categoryId" id="categoryId" class="custome-select browser-default" required>
                                        <option hidden disabled selected value>None</option>
                                        <?php
                                        $catSql = "SELECT * FROM categories";
                                        $catResult = mysqli_query($conn, $catSql);
                                        if ($catResult) {
                                            while ($row = mysqli_fetch_array($catResult)) {
                                                $catId = $row['category_id'];
                                                $catName = $row['category_name'];

                                                echo '<option value="' . $catId . '">' . $catName . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="image">Image: </label>
                                    <input type="file" class="form-control" name="image" id="image" accept=".jpg" required style="border:none;">
                                    <small id="info" class="form-text text-muted mx-3">Please upload .jpg file</small>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Veg/Non-Veg:</label>
                                    <div style="display: flex; gap: 15px; align-items: center;">
                                        <label style="color: green; font-weight: bold; display: flex; align-items: center;">
                                            <input type="radio" name="is_veg" value="Veg" required style="accent-color: green; margin-right: 5px;">
                                            Veg
                                        </label>
                                        <label style="color: red; font-weight: bold; display: flex; align-items: center;">
                                            <input type="radio" name="is_veg" value="Non-Veg" required style="accent-color: red; margin-right: 5px;">
                                            Non-Veg
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer" style="background-color: rgb(99, 85, 78);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="createItem" class="btn_create btn btn-sm offset-md-4">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Table Panel -->
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderd table-hover mb-0">
                                <thead style="background-color: rgb(99, 85, 78);color:white">
                                    <tr>
                                        <th class="text-center" style="width: 7%;">ID</th>
                                        <th class="text-center">IMG</th>
                                        <th class="text-center" style="width: 58%;">Item Detail</th>
                                        <th class="text-center" style="width: 18%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT f.*,c.category_name FROM food_type f,categories c WHERE f.category_id=c.category_id";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $catName = $row['category_name'];
                                        $foodId = $row['food_id'];
                                        $foodName = $row['food_name'];
                                        $foodPrice = $row['food_price'];
                                        $foodDesc = $row['food_desc'];
                                        $is_veg = $row['is_veg'];
                                        $food_offer = $row['food_offer'];
                                        $pic = $row['food_img'];

                                        echo '
                                                <tr>
                                                    <td class="text-center"><b>' . $foodId . '</b></td>
                                                    <td><img src="/cafe_management_system/img/' . $pic . '" alt="image for this category" width="150px" height="150px"></td>
                                                    <td>
                                                        <p>Name: <b>' . $foodName . '</b></p>
                                                        <p>Description: <b class="truncate">' . $foodDesc . '</b></p>
                                                        <p>Price: <b>' . $food_offer . '</b></p>
                                                        <p>Offer Price: <b>' . $foodPrice . '</b></p>
                                                        <p>Category: <b>' . $catName . '</b></p>
                                                        <p>Veg/Non-veg: <b>' . $is_veg . '</b></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="row mx-auto" style="width:112px">
                                                            <button class="btn btn-sm edit_cat btn_form" type="button" data-toggle="modal" data-target="#updateItem' . $foodId . '">Edit</button>
                                                            <form action="/cafe_management_system/admin/partial/_menuManage.php" method="POST">
                                                                <button class="btn btn-sm btn_form" name="removeItem" style="margin-left:9px;" onclick="return confirm(\'Are You Sure You Want to Delete?\')">Delete</button>
                                                                <input type="hidden" name="foodId" value="' . $foodId . '">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--update category-->
    <?php
    $catsql = "SELECT f.*, c.category_name FROM food_type f, categories c WHERE f.category_id = c.category_id";
    $catresult = mysqli_query($conn, $catsql);

    while ($catRow = mysqli_fetch_array($catresult)) {
        $catName = $catRow['category_name'];
        $foodId = $catRow['food_id'];
        $foodName = $catRow['food_name'];
        $foodPrice = $catRow['food_price'];
        $foodOffer = $catRow['food_offer'];
        $foodDesc = $catRow['food_desc'];
        $pic = $catRow['food_img'];
    ?>
        <div class="modal fade" id="updateItem<?php echo $foodId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $foodId; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:rgb(99, 85, 78);color:white;font-weight:bold;">
                        <h5 class="modal-title">Food Id: <b><?php echo $foodId; ?></b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background: rgb(225, 221, 220);">
                        <form action="/cafe_management_system/admin/partial/_menuManage.php" method="post" enctype="multipart/form-data">
                            <div class="text-left my-2 row" style="border-bottom: 2px solid white;">
                                <div class="form-group col-md-8">
                                    <b>
                                        <label for="image">Image</label>
                                        <input type="file" name="itemimage" id="itemimage" accept="images/*" class="form-control" style="border: none;">
                                        <small id="Info" class="form-text text-muted mx-3">Please upload Image file</small>
                                        <input type="hidden" name="foodId" id="foodId" value="<?php echo $foodId; ?>">
                                        <button type="submit" class="btn_form btn btn-sm" name="updateItemPhoto">Update image</button>
                                    </b>
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="/cafe_management_system/img/<?php echo $pic; ?>" alt="image for this food item" width="100px" height="100px">
                                </div>
                            </div>

                            <div class="text-left my-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $foodName; ?>" required>
                            </div>
                            <div class="text-left my-2">
                                <label for="desc">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="2" required><?php echo $foodDesc; ?></textarea>
                            </div>
                            <div class="text-left my-2 row">
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="number" name="offerprice" id="offerprice" class="form-control" value="<?php echo $foodOffer; ?>" min="1" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">Offer Price</label>
                                    <input type="number" name="price" id="price" class="form-control" value="<?php echo $foodPrice; ?>" min="1" required>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categoryId">Category</label>
                                    <select name="categoryId" id="categoryId" class="custom-select">
                                        <?php
                                        $catSql = "SELECT * FROM categories";
                                        $catResult = mysqli_query($conn, $catSql);
                                        while ($row = mysqli_fetch_array($catResult)) {
                                            $catId = $row['category_id'];
                                            $selected = ($catId == $catRow['category_id']) ? 'selected' : '';
                                            echo '<option value="' . $catId . '" ' . $selected . '>' . $row['category_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-left my-2">
                                <b><label for="is_veg">Veg/Non-Veg</label></b>
                                <div style="display: flex; gap: 15px; align-items: center;">
                                    <label style="color: green; font-weight: bold; display: flex; align-items: center;">
                                        <input type="radio" name="is_veg" value="Veg" <?php echo $catRow['is_veg'] == 'Veg' ? 'checked' : ''; ?> required style="accent-color: green; margin-right: 5px;">
                                        Veg
                                    </label>
                                    <label style="color: red; font-weight: bold; display: flex; align-items: center;">
                                        <input type="radio" name="is_veg" value="Non-Veg" <?php echo $catRow['is_veg'] == 'Non-Veg' ? 'checked' : ''; ?> required style="accent-color: red; margin-right: 5px;">
                                        Non-Veg
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="foodId" value="<?php echo $foodId; ?>">
                            <button type="submit" class="btn btn-sm btn_form" name="updateItem">Update Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>