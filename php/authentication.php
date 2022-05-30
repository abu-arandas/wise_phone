<?php

    require '../sql/connection.php';

    session_start();

    error_reporting(0);

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		if ($password == $cpassword) {
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = mysqli_query($conn, $sql);
			if (!$result->num_rows > 0) {
				$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('Wow! User Registration Completed.')</script>";
					echo "<script>window.location='../login.php'</script>";
				} else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
					echo "<script>window.location='../register.php'</script>";
				}
			} else {
				echo "<script>alert('Woops! Email Already Exists.')</script>";
				echo "<script>window.location='../register.php'</script>";
			}
			
		} else {
			echo "<script>alert('Password Not Matched.')</script>";
			echo "<script>window.location='../register.php'</script>";
		}
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$_POST[password]'";
        $result = mysqli_query($conn, $sql);
        if ($email == "admin@info.com"  &&   $_POST['password'] == "admin") {
            
            $_SESSION['username']= "Admin";
            echo "<script>alert('Welcome Admin')</script>";
            echo "<script>window.location='../admin.php'</script>";

        }else if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            echo "<script>alert('Welcome ".$_SESSION['username']."')</script>";
            echo "<script>window.location='../index.php'</script>";
        } else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
            echo "<script>window.location='../login.php'</script>";
        }
    }
    
    if(isset($_GET["action"])) {  
        if($_GET["action"] == "logout") {  
            session_start();
            session_destroy();
    
            echo "<script>alert('Thanks to choose us come back again')</script>";
            echo "<script>window.location='../index.php'</script>";
        }
    }

    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();

        echo "<script>alert('Thanks to choose us come back again')</script>";
        echo "<script>window.location='../index.php'</script>";
    }
?>