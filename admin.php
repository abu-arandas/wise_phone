<?php include('sql/connection.php') ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Site Metas -->
        <title>WISE Phones</title>

        <!-- Site Favicon -->
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <header class="top-navbar sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#top"><img src="img/logo.png" alt="Wise Phone Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="#top">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="#orders">Orders</a></li>
                        </ul>
                        <div class="d-inline-flex align-items-center">
                            <div class="user-menu">                            
                                <?php 
                                    session_start();
                                    if (!isset($_SESSION['username'])) {
                                        echo '<a href="login.php"><i class="fa fa-user"></i>Login</a>';
                                    }else {
                                        echo '<a href="php/authentication.php?action=logout"><i class="fa fa-user"></i> Logout</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <?php
            include('sections/slider_admin.php');

            include('sections/about.php');

            include('sections/products_admin.php');
        ?>

        <div class="orders bg_color" id="orders">
            <div class="container">
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                            $sql = "SELECT * FROM `orders`";
                            $result = mysqli_query($conn,$sql);

                            while($row = mysqli_fetch_assoc($result)) :
                                $username = $row['username'];
                                $email = $row['email'];
                                $address = $row['address'];
                                $phone = $row['phone'];
                                $product_name = $row['products_name'];
                                $product_quantity = $row['products_quantity'];
                                $price = $row['price'];
                        ?>
                        <tr>
                            <td><?php echo $username ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $address ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php echo $product_name ?></td>
                            <td><?php echo $product_quantity ?></td>
                            <td><?php echo $price ?></td>
                            <td><a href="php/cart.php?action=done&id=<?php echo $row['id']; ?>" class="btn custome-fill-btn" name="done">Done</a></td>
                        </tr>
                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>

        <?php include('sections/footer.php') ?>

        <!-- JS -->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>