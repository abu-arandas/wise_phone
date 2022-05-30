<?php
    include("../sql/connection.php");

    /* ====== ADD NEW Category ====== */
    if (isset($_POST['add_Category'])) {
        $title = $_POST['title'];

        $sql = "SELECT * FROM `product_category` WHERE (`title`) = ('$title')";
        $result = mysqli_query($conn,$sql);
        $result_check = mysqli_num_rows($result);

        if ($result_check > 0) {
            echo "<script>alert('Already Exist')</script>";
			echo "<script>window.history.back()</script>";
        }else {
            $sql = "INSERT INTO `product_category` (`title`) VALUES ('$title')";
            $result = mysqli_query($conn,$sql);

            echo "<script>alert('Successfully Added')</script>";
			echo "<script>window.history.back()</script>";
        }
    }

    /* ====== DELETE Category ====== */
    if (isset($_POST['delete_Category'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `product_category` WHERE id=$id";
        mysqli_query($conn,$sql);
            
        echo "<script>alert('Successfully Deleted')</script>";
        echo "<script>window.history.back()</script>";
    }

    /* ====== ADD NEW Product ====== */
    if (isset($_POST['add_Product'])) {
       
        $title=$_POST["title"];
        $description=$_POST["description"];
        $image=$_POST["image"];
        $category_id=$_POST["category_id"];
        $price=$_POST["price"];
        
        $sql = "INSERT INTO `product` (`title`, `description`, `price`, `image`, `category_id`) VALUES ('$title', '$description','$price','$image','$category_id')";
        $result = mysqli_query($conn,$sql);

        echo "<script>alert('Successfully Added')</script>";
        echo "<script>window.history.back()</script>";
    }

    /* ====== DELETE Category ====== */
    if (isset($_POST['delete_product'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `product` WHERE id=$id";
        mysqli_query($conn,$sql);
            
        echo "<script>alert('Successfully Deleted')</script>";
        echo "<script>window.history.back()</script>";
    }
?>