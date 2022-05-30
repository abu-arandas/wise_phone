<section class="products bg_color" id="products">
    <div class="container">
        <div class="title"><h3>Products</h3></div>
        
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
                                <form class="animate" method="post" action="single_product.php?id=<?php echo $id ?>">                                
                                    <div class="submit-button text-center">
                                        <button type="submit">Read More</button>
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