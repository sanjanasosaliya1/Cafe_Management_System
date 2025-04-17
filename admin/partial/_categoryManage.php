    <?php
        include("_dbconnect.php");
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(isset($_POST['createCategory']))
            {
                $name=$_POST["name"];
                $desc=$_POST["desc"];
            
                $pic = "";
        
                if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
                {
                    $uploaddir=$_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
                    $targetfile = $uploaddir . basename($_FILES['image']['name']);
                    
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$targetfile))
                    {
                        $pic = basename($_FILES['image']['name']);
                    }
                    else
                    {
                        echo "<script>alert('Failed to upload image');
                            window.location=document.referrer;
                            </script>";
                    }
                }

                if(!empty($pic))
                {
                    $sql="INSERT INTO categories(category_name,category_desc,category_created_date,category_img) VALUES ('$name','$desc',CURRENT_DATE,'$pic')";
                }

                $result=mysqli_query($conn,$sql);

                if($result)
                {
                    echo "<script>alert('Success');
                                window.location=document.referrer;
                                </script>";
                }
                else
                {
                    echo "<script>alert('Failed');
                            window.location=document.referrer;
                            </script>";
                }
            }

            if (isset($_POST['removeCategory'])) 
            {
                $catId = $_POST['catId'];

                $selectsql = "SELECT category_img FROM categories WHERE category_id = '$catId'";
                $selectresult = mysqli_query($conn, $selectsql);
                
                if ($selectresult && mysqli_num_rows($selectresult) > 0) 
                {
                    $row = mysqli_fetch_array($selectresult);
                    $filename = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['category_img'];
            
                    $sql = "DELETE FROM categories WHERE category_id = '$catId'";
                    $result = mysqli_query($conn, $sql);
            
                    if ($result) 
                    {
                        if (file_exists($filename)) 
                        {
                            unlink($filename);
                        }
                        echo "<script>
                                alert('Category and associated image removed successfully.');
                                window.location = document.referrer;
                            </script>";
                    } 
                    else 
                    {
                        echo "<script>
                                alert('Failed to remove category.');
                                window.location = document.referrer;
                            </script>";
                    }
                } 
                else 
                {
                    echo "<script>
                            alert('Category not found.');
                            window.location = document.referrer;
                        </script>";
                }
            }

            if (isset($_POST['updateCategory'])) 
            {
                $catId = $_POST['catId'];
                $catName = $_POST["name"];
                $catDesc = $_POST["desc"];
                $catPic = "";
            
                if(isset($_FILES['catimage']) && !empty($_FILES['catimage']['name']))
                {
                    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
                    $targetfile = $uploaddir . basename($_FILES['catimage']['name']);
                    
                    if(move_uploaded_file($_FILES['catimage']['tmp_name'], $targetfile))
                    {
                        $catPic = basename($_FILES['catimage']['name']);
            
                        $selectsql = "SELECT category_img FROM categories WHERE category_id = '$catId'";
                        $selectresult = mysqli_query($conn, $selectsql);
                        if ($selectresult && mysqli_num_rows($selectresult) > 0) 
                        {
                            $row = mysqli_fetch_array($selectresult);
                            $oldFile = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['category_img'];
                            if (file_exists($oldFile)) 
                            {
                                unlink($oldFile);
                            }
                        }
                    }
                    else
                    {
                        echo "<script>alert('Failed to upload image');
                            window.location=document.referrer;
                            </script>";
                        exit;
                    }
                }
            
                if(!empty($catPic))
                {
                    $sql = "UPDATE categories SET category_name='$catName', category_desc='$catDesc', category_img='$catPic' WHERE category_id='$catId'";
                }
                else 
                {
                    $sql = "UPDATE categories SET category_name='$catName', category_desc='$catDesc' WHERE category_id='$catId'";
                }

                $result = mysqli_query($conn, $sql);
            
                if($result)
                {
                    echo "<script>alert('update successfully');
                    window.location=document.referrer;
                    </script>";
                }
                else
                {
                    echo "<script>alert('Failed');
                    window.location=document.referrer;
                    </script>";
                }
            }

            
            if(isset($_POST['updateCatPhoto']))
            {
                $catId = $_POST['catId'];
                $catPic = "";
            
                if(isset($_FILES['catimage']) && !empty($_FILES['catimage']['name']))
                {
                    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
                    $targetfile = $uploaddir . basename($_FILES['catimage']['name']);
                    
                    if(move_uploaded_file($_FILES['catimage']['tmp_name'], $targetfile))
                    {
                        $catPic = basename($_FILES['catimage']['name']);
            
                        $selectsql = "SELECT category_img FROM categories WHERE category_id = '$catId'";
                        $selectresult = mysqli_query($conn, $selectsql);
                        if ($selectresult && mysqli_num_rows($selectresult) > 0) 
                        {
                            $row = mysqli_fetch_array($selectresult);
                            $oldFile = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['category_img'];
                            if (file_exists($oldFile)) 
                            {
                                unlink($oldFile);
                            }
                        }
                    }
                    else
                    {
                        echo "<script>alert('Failed to upload image');
                            window.location=document.referrer;
                            </script>";
                        exit;
                    }
                }
            
                if(!empty($catPic))
                {
                    $sql = "UPDATE categories SET category_img='$catPic' WHERE category_id='$catId'";
                    $result = mysqli_query($conn, $sql);
            
                    if($result)
                    {
                        echo "<script>alert('Image updated successfully');
                        window.location=document.referrer;
                        </script>";
                    }
                    else
                    {
                        echo "<script>alert('Failed to update image');
                        window.location=document.referrer;
                        </script>";
                    }
                }
            }            
        }
    ?>