<?php
    include("_dbconnect.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['createItem']))
        {
            $name=$_POST["name"];
            $desc=$_POST["description"];
            $price=$_POST["price"];
            $is_veg = $_POST['is_veg'];
            $food_offer = $_POST['offerprice'];
            $categoryId=$_POST["categoryId"];
        
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
                $sql="INSERT INTO food_type(food_name,food_price,food_desc,category_id,food_update,food_img, is_veg,food_offer) VALUES ('$name','$price','$desc','$categoryId',current_timestamp(),'$pic','$is_veg','$food_offer')";
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

        if (isset($_POST['removeItem'])) 
        {
            $foodId = $_POST['foodId'];

            $selectsql = "SELECT food_img FROM food_type WHERE food_id = '$foodId'";
            $selectresult = mysqli_query($conn, $selectsql);
            
            if ($selectresult && mysqli_num_rows($selectresult) > 0) 
            {
                $row = mysqli_fetch_array($selectresult);
                $filename = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['food_img'];
        
                $sql = "DELETE FROM food_type WHERE food_id = '$foodId'";
                $result = mysqli_query($conn, $sql);
        
                if ($result) 
                {
                    if (file_exists($filename)) 
                    {
                        unlink($filename);
                    }
                    echo "<script>
                            alert('Food item and associated image removed successfully.');
                            window.location = document.referrer;
                        </script>";
                } 
                else 
                {
                    echo "<script>
                            alert('Failed to remove Food item.');
                            window.location = document.referrer;
                        </script>";
                }
            } 
            else 
            {
                echo "<script>
                        alert('Food item not found.');
                        window.location = document.referrer;
                    </script>";
            }
        }

        if (isset($_POST['updateItem'])) 
        {
            $foodId = $_POST['foodId'];
            $name=$_POST["name"];
            $desc=$_POST["description"];
            $price=$_POST["price"];
            $is_veg = $_POST['is_veg'];
            $food_offer = $_POST['offerprice'];
            $categoryId=$_POST["categoryId"];
            $foodPic = "";
        
            if(isset($_FILES['itemimage']) && !empty($_FILES['itemimage']['name']))
            {
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
                $targetfile = $uploaddir . basename($_FILES['itemimage']['name']);
                
                if(move_uploaded_file($_FILES['itemimage']['tmp_name'], $targetfile))
                {
                    $foodPic = basename($_FILES['itemimage']['name']);
        
                    $selectsql = "SELECT food_img FROM food_type WHERE food_id = '$foodId'";
                    $selectresult = mysqli_query($conn, $selectsql);
                    if ($selectresult && mysqli_num_rows($selectresult) > 0) 
                    {
                        $row = mysqli_fetch_array($selectresult);
                        $oldFile = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['food_img'];
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
        
            if(!empty($foodPic))
            {
                $sql = "UPDATE food_type SET food_name='$name', food_desc='$desc', food_price='$price', category_id='$categoryId', food_img='$foodPic', is_veg='$is_veg',food_offer='$food_offer' WHERE food_id='$foodId'";
            }
            else 
            {
                $sql = "UPDATE food_type SET food_name='$name', food_desc='$desc',food_price='$price', category_id='$categoryId', is_veg='$is_veg',food_offer='$food_offer' WHERE food_id='$foodId'";
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

        
        if(isset($_POST['updateItemPhoto']))
        {
            $foodId = $_POST['foodId'];
            $foodPic = "";
        
            if(isset($_FILES['itemimage']) && !empty($_FILES['itemimage']['name']))
            {
                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/cafe_management_system/img/';
                $targetfile = $uploaddir . basename($_FILES['itemimage']['name']);
                
                if(move_uploaded_file($_FILES['itemimage']['tmp_name'], $targetfile))
                {
                    $foodPic = basename($_FILES['itemimage']['name']);
        
                    $selectsql = "SELECT food_img FROM food_type WHERE food_id = '$foodId'";
                    $selectresult = mysqli_query($conn, $selectsql);
                    if ($selectresult && mysqli_num_rows($selectresult) > 0) 
                    {
                        $row = mysqli_fetch_array($selectresult);
                        $oldFile = $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/img/' . $row['food_img'];
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
        
            if(!empty($foodPic))
            {
                $sql = "UPDATE food_type SET food_img='$foodPic' WHERE food_id='$foodId'";
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