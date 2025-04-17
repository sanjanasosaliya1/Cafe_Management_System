<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

    <link rel="icon" href="/cafe_management_system/admin/assetsForSideBar/img/Logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="admin/assetesForSideBar/css/styles.css">
</head>

<body style="background-color: #fdf8f3;">
    <div class="container-fluid" style="margin-top: 98px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <form action="/cafe_management_system/admin/partial/_categoryManage.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header" style="background-color:rgb(99, 85, 78);color:white;font-weight:bold;">
                                Create New Category
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label">Category Name: </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Category Description: </label>
                                    <input type="text" class="form-control" name="desc" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="image">Image: </label>
                                    <input type="file" class="form-control" name="image" id="image" accept=".jpg" required style="border:none;">
                                    <small id="info" class="form-text text-muted mx-3">Please upload .jpg file</small>
                                </div>
                            </div>
                            <div class="card-footer" style="background-color: rgb(99, 85, 78);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="createCategory" class="btn_create btn btn-sm offset-md-4">Create</button>
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
                                        <th class="text-center" style="width: 58%;">Category Detail</th>
                                        <th class="text-center" style="width: 18%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $catId = $row['category_id'];
                                        $catName = $row['category_name'];
                                        $catDesc = $row['category_desc'];
                                        $pic = $row['category_img'];

                                        echo '
                                                <tr>
                                                    <td class="text-center"><b>' . $catId . '</b></td>
                                                    <td><img src="/cafe_management_system/img/' . $pic . '" alt="image for this category" width="150px" height="150px"></td>
                                                    <td>
                                                        <p>Name: <b>' . $catName . '</b></p>
                                                        <p>Description: <b class="truncate">' . $catDesc . '</b></p>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="row mx-auto" style="width:112px">
                                                            <button class="btn btn-sm edit_cat btn_form" type="button" data-toggle="modal" data-target="#updateCat' . $catId . '">Edit</button>
                                                            <form action="/cafe_management_system/admin/partial/_categoryManage.php" method="POST">
                                                                <button class="btn btn-sm btn_form" name="removeCategory" style="margin-left:9px;" onclick="return confirm(\'Are You Sure You Want to Delete?\')">Delete</button>
                                                                <input type="hidden" name="catId" value="' . $catId . '">
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
    $catsql = "SELECT * FROM categories";
    $catresult = mysqli_query($conn, $catsql);

    while ($catRow = mysqli_fetch_array($catresult)) {
        $catId = $catRow['category_id'];
        $catName = $catRow['category_name'];
        $catDesc = $catRow['category_desc'];
        $catPic = $catRow['category_img'];

    ?>

        <div class="modal fade" id="updateCat<?php echo $catId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $catId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:rgb(99, 85, 78);color:white;font-weight:bold;">
                        <h5 class="modal-title" id="updateCat<?php echo $catId; ?>">Category Id: <b><?php echo $catId; ?></b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background: rgb(225, 221, 220)">
                        <form action="/cafe_management_system/admin/partial/_categoryManage.php" method="post" enctype="multipart/form-data">
                            <div class="text-left my-2 row" style="border-bottom: 2px solid white;">
                                <div class="form-group col-md-8">
                                    <b>
                                        <label for="image">Image</label>
                                        <input type="file" name="catimage" id="catimage" accept="imges/*" class="form-control" style="border: none;">
                                        <small id="Info" class="form-text text-muted mx-3">Please upload Image file</small>
                                        <input type="hidden" name="catId" id="catId" value="<?php echo $catId; ?>">
                                        <button type="submit" class="btn_form btn btn-sm" name="updateCatPhoto">Update image</button>
                                    </b>
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="/cafe_management_system/img/<?php echo $catPic; ?>" alt="image for this category" width="100px" height="100px">
                                </div>
                            </div>

                            <div class="text-left my-2">
                                <b><label for="name">Name</label></b>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $catName; ?>" required>
                            </div>
                            <div class="text-left my-2">
                                <b><label for="desc">Description</label></b>
                                <textarea name="desc" id="desc" class="form-control" rows="2" required minlength="6"><?php echo $catDesc; ?></textarea>
                            </div>
                            <input type="hidden" name="catId" id="cateId" value="<?php echo $catId; ?>">
                            <button type="submit" class="btn_form btn btn-sm" name="updateCategory">Update Category</button>
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