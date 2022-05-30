<section class="products bg_color" id="products">
    <div class="container">
        <div class="title">
            <h3>Products</h3>
            <p class="mt-4"><a class="btn btn-lg btn-circle custome-fill-btn" 
            href="#category_add" data-toggle="modal" data-target="#category_add">Add Category</a></p>
        </div>

        <div class="category_display">
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            $query = "SELECT * FROM `product_category`";
                            $result = mysqli_query($conn, $query);
                            $resultCheck = mysqli_num_rows($result);

                            while ($row = mysqli_fetch_assoc($result)): 
                                $id = $row['id'];
                                $title = $row['title'];
                            ?>
                                <tr>
                                    <td><?php echo $title; ?></td>
                                    <td>                                        
                                    <form class="animate" method="post" action="php/products.php?id=<?php echo $row['id'] ?>">                                
                                        <div class="submit-button text-center">
                                            <button class="btn btn-lg btn-circle custome-fill-btn" name="delete_Category" type="submit">Delete</button>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                        <?php endwhile;?>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="button_groub">
            <div class="filter_buttons">
                <button class="btn filter_button active"  data-filter="all" btn-btn denger>All</button>
                <?php
                $sql = "SELECT * FROM `product_category`";
                $result = mysqli_query($conn,$sql);
                $result_check = mysqli_num_rows($result);

                while($row = mysqli_fetch_assoc($result)) :
                    $id = $row['id'];
                    $title = $row['title'];
                
                ?>
                <button class="btn filter_button" data-filter="<?php echo $title ?>"><?php echo $title ?></button>
                <?php endwhile; ?>
                <a class="btn filter_button" href="#product_add" 
                data-toggle="modal" data-target="#product_add">Add Product</a>
            </div>

        
        </div>

        <div class="filtter_item">
            <div class="row">
                <?php
                    $query = "SELECT * FROM `product`";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) : 
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image = $row['image'];
                        $category_id = $row['category_id'];
                    ?>
                    
                <div class="col-md-4 filter <?php echo $category_id ?>">
                    <div class="card">
                        <div class="content">
                            <div class="content_image">
                                <img src="img/<?php echo $image ?>" alt="<?php echo $title ?>">  
                            </div>
                            <div class="content_information">
                                <h3><?php echo $title ?></h3>
                                <h2><?php echo $price ?> JD</h2>
                            </div>
                        </div>
                        <ul class="card_links">
                            <li>                    
                                <form class="animate" method="post" action="php/products.php?id=<?php echo $row['id'] ?>">                                
                                    <div class="submit-button text-center">
                                        <button name="delete_product" type="submit">Delete</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
</section>

<!-- ADD Category -->
<div class="modal" id="category_add" tabindex="-1" role="dialog" aria-labelledby="category_addLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="category_addLabel">Category Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="animate" method="post" action="php/products.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="title" name="title" placeholder="Category title"
                                    required data-error="Please enter Category title">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn btn-lg btn-circle custome-fill-btn" name="add_Category" type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ADD PRODUCT -->
<div class="modal" id="product_add" tabindex="-1" role="dialog" aria-labelledby="product_addLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product_addLabel">Product Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="animate" method="post" action="php/products.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="title" name="title" placeholder="Product title"
                                    required data-error="Please enter Product title">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="description" name="description" placeholder="Product Description"
                                    required data-error="Please enter Product description">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="price" name="price" placeholder="Product Price"
                                    required data-error="Please enter Product price">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control"
                                    id="image" name="image" placeholder="Product Image"
                                    required data-error="Please enter Product image">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <select class="form-select form-control" name='category_id' aria-label="Default select example">
                                <option selected>Select Product</option>
                                <?php 
                                    $sql = "SELECT * FROM `product_category`";
                                    $result = mysqli_query($conn,$sql);
                                    $result_check = mysqli_num_rows($result);

                                    while($row = mysqli_fetch_assoc($result)) :
                                        $id = $row['id'];
                                        $title = $row['title'];

                                ?>
                                <option value="<?php echo $title?>"><?php echo $title?></option>
                                <?php endwhile ?>

                            </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn btn-lg btn-circle custome-fill-btn" name="add_Product" type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>