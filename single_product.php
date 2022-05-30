<?php $id = $_GET['id']; include('sql/connection.php') ?>
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
                    <div class="d-inline-flex align-items-center">
                            
                        <?php
                                if (empty($_SESSION["shopping_cart"])) {
                                    echo ''; 
                                }else {
                                    echo '<div class="shopping-item"><a href="cart.php">Cart - <i class="fa fa-shopping-cart"></i></a></div>'; 
                                }
                            ?>
                        <div class="user-menu"><a href="login.php"><i class="fa fa-user"></i>Login</a></div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="single-product-area" >
            
            <div class="product-big-title-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-bit-title text-center">
                                <h2>Shop</h2>
                            
                                <div class="product-breadcroumb">
                                    <a href="index.php">Home</a>
                                    <?php 
                                        $sql = "SELECT * FROM `product` WHERE id = $id";
                                        $result = mysqli_query($conn,$sql);
                                        $result_check = mysqli_num_rows($result);
                                        $row = mysqli_fetch_assoc($result);
                                                                        
                                        $title = $row['title'];
                                        $description = $row['description'];
                                        $price = $row['price'];
                                        $image = $row['image'];
                                        $category_id = $row['category_id'];
                                    ?>
                                    <a href="" class="disabled"><?php echo $title ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-information">
                <div class="container" id="products">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="img/<?php echo $image ?>" alt="<?php echo $title ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $title ?></h2>
                                <div class="product-inner-price"><ins>$<?php echo $price ?></ins></div>  
                                <p class="product-description"><?php echo $description ?></p>
                                
                                <form method="post" action="php/cart.php?id=<?php echo $id ?>" class="cart">
                                    <input type="number" size="4" class="input-text qty text" value="1" name="quantity" min="1">
                                    <input type="hidden" name="hidden_name" value="<?php echo $title; ?>" />  
                                    <input type="hidden" name="hidden_price" value="<?php echo $price; ?>" />
                                    <button class="add_to_cart_button" type="submit" name="add_to_cart">Add to cart</button>
                                </form>
                                
                            </div>
                        </div>
                                
                    </div>
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