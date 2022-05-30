<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wise_phone";

    $conn = mysqli_connect($servername,$username,$password,$dbname) or die ("Connection failed: " . $conn->connect_error);
?>