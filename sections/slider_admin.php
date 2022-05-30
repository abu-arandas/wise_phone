<?php require 'sql/connection.php' ?>
<section id="silides" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <?php 
            $output = '';
            $count = 0;
            
            $sql = "SELECT * FROM `slider`";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {
                if($count == 0) {
                    $output .= '<div class="carousel-item active">';
                }
                else {
                    $output .= '<div class="carousel-item">';
                }
                $output .= '
                    <div class="overlay-background"></div>
                    <img class="d-block w-100" src="img/'.$row["image"].'" alt="'.$row["title"].'" />
                        <div class="carousel-caption d-block">
                            <h1>'.$row["title"].'</h3>
                            <p>'.$row['description'].'</p>
                            <form class="animate" method="post" action="php/slider.php?id='.$row['id'].'">                                
                                <div class="submit-button text-center">
                                    <button class="btn btn-lg btn-circle custome-fill-btn" name="delete_slider" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                ';
                $count = $count + 1;
            }

            echo $output;
        ?>
    </div>

    <ol class="carousel-indicators">
        <?php 
            $output = ''; 
            $count = 0;

            $sql = "SELECT * FROM `slider`";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {
                if($count == 0) {
                    $output .= ' <li data-target="#silides" data-slide-to="'.$count.'" class="active"></li> ';
                }
                else {
                    $output .= ' <li data-target="#silides" data-slide-to="'.$count.'"></li> ';
                }
                $count = $count + 1;
            }

            echo $output;
        ?>
    </ol>

    <a class="carousel-control-prev" href="#silides" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#silides" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <a class="carousel-control-add"href="#slider_edit" data-toggle="modal" data-target="#slider_edit">
        <i class="fa fa-plus"></i>
    </a>
</section>

<!-- Add Slider Modal -->
<div class="modal fade" id="slider_edit" tabindex="-1" role="dialog" aria-labelledby="slider_editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="slider_editLabel">Slider Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="animate" method="post" action="php/slider.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="title" name="title" placeholder="Category Title"
                                    required data-error="Please enter category title">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    id="description" name="description" placeholder="Category Description"
                                    required data-error="Please enter category description">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control"
                                    id="image" name="image" placeholder="Category Image"
                                    required data-error="Please enter category image">
                            </div>                                 
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn btn-lg btn-circle custome-fill-btn" name="add_slider" type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>