<?php 
    session_start();
    include('sql/connection.php');

    function checkoutCheck() {
        if (!isset($_SESSION['username'])) {
            echo '<P>Please <a href="login.php">Login</a></p>';
        }else {
            echo '<a class="btn btn-circle custome-fill-btn" href="#checkout" data-toggle="modal" data-target="#checkout">Check Out</a>';
        }
    }
?>

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

        <div class="cart">
            <div class="container">
                <table class="table">
                    <tr>
                        <th>Item Name</th>
                        <th>Item Count</th>
                        <th colspan="2">Item Price</th>
                        <th>Action</th>
                    </tr>

                    <?php if (empty($_SESSION["shopping_cart"])) :?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total Price</strong></td>
                            <td><strong>0</strong></td>
                        </tr>
                    <?php else: 
                        $total = 0;  
                        foreach($_SESSION["shopping_cart"] as $keys => $values):
                    ?>
                        <tr>  
                            <td><?php echo $values["item_name"]; ?></td>  
                            <td><?php echo $values["item_quantity"]; ?></td>  
                            <td>JD <?php echo $values["item_price"]; ?></td>  
                            <td>JD <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                            <td><a href="php/cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                        </tr>  
                    <?php 
                        $total = $total + ($values["item_quantity"] * $values["item_price"]); 
                        endforeach
                    ?>
                     <tr>  
                        <td colspan="3">Total</td>  
                        <td>JD <?php echo number_format($total, 2); ?></td>  
                        <td><?php echo checkoutCheck() ?></td>
                    </tr> 
                    <?php endif?>
                
                </table>
                
            </div>
        </div>

        <div class="modal" id="checkout" tabindex="-1" role="dialog" aria-labelledby="checkoutLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutLabel">User Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="php/cart.php">    
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <strong>Name:</strong> <?php echo $_SESSION['username'] ?>
                                    </p>  
                                    <input type="hidden" name='username' value="<?php echo $_SESSION['username'] ?>">                             
                                </div>
                                <div class="col-md-12">
                                    <p>
                                        <strong>E-mail:</strong> <?php echo $_SESSION['email'] ?>
                                        <input type="hidden" name='email' value="<?php echo $_SESSION['email'] ?>">  
                                    </p>                                
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>
                                            <strong>Address:</strong> 
                                            <input type="text" class="form-control"
                                            id="address" name="address" required data-error="Please enter your address">
                                        </p> 
                                    </div>                                 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>
                                            <strong>Phone:</strong>
                                            <input type="text" class="form-control"
                                            id="phone" name="phone" required data-error="Please enter your phone">
                                        </p>
                                    </div>                                 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>
                                            <strong>Products:</strong>
                                            <?php foreach($_SESSION["shopping_cart"] as $keys => $values){
                                                $product = $values["item_quantity"] .' * '. $values["item_name"] .' / ';
                                                echo $product;
                                            } ?>
                                        </p>
                                        <input type="hidden" name='quantity' value="<?php echo $values["item_quantity"] ?>">  
                                        <input type="hidden" name='title' value="<?php echo $values["item_name"] ?>">  
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <P>
                                        <strong>Price:</strong> JD <?php echo $total ?>
                                    </P>                                
                                    <input type="hidden" name='total' value="<?php echo $total ?>">  
                                </div>
                                <div class="col-md-12">                            
                                    <div class="submit-button text-center">
                                        <button class="btn btn-secondary" name="checkout" type="submit">Check Out</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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