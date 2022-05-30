<?php
    include("../sql/connection.php");

    /* ====== ADD NEW SLIDER ====== */
    if (isset($_POST['add_slider'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $sql = "INSERT INTO `slider` (`title`,`description`,`image`) VALUES ('$title','$description','$image')";
        $result = mysqli_query($conn,$sql);

        echo "<script>alert('Successfully Added')</script>";
        echo "<script>window.history.back()</script>";
        
    }

    /* ====== DELETE SLIDER ====== */
    if (isset($_POST['delete_slider'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `slider` WHERE id=$id";
        mysqli_query($conn,$sql);
            
        echo "<script>alert('Successfully Deleted')</script>";
        echo "<script>window.history.back()</script>";
    }
?>