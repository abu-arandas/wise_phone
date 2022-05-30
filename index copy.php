<?php session_start(); ?>
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
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="Wise Phone Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="#top">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        </ul>
                        <div class="d-inline-flex align-items-center">
                            <?php
                                if (empty($_SESSION["shopping_cart"])) {
                                    echo ''; 
                                }else {
                                    echo '<div class="shopping-item"><a href="cart.php">Cart - <i class="fa fa-shopping-cart"></i></a></div>'; 
                                }
                            ?>
                            <div class="user-menu">
                                <?php 
                                    if (!isset($_SESSION['username'])) {
                                        echo '<a href="login.php"><i class="fa fa-user"></i>Login</a>';
                                    }else {
                                        echo '<a href="#user_info" data-toggle="modal" data-target="#user_info"><i class="fa fa-user"></i>' . $_SESSION['username'] .'</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="modal" id="user_info" tabindex="-1" role="dialog" aria-labelledby="user_infoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="user_infoLabel">User Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <strong>E-mail:</strong><br>
                            <?php echo $_SESSION['email'] ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="php/authentication.php">                                
                            <div class="submit-button text-center">
                                <button class="btn btn-secondary" name="logout" type="submit">Logout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include('sections/slider.php');

            include('sections/about.php');

            include('sections/products.php');

            include('sections/contact.php');

            include('sections/footer.php')
        ?>

        <!-- JS -->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>