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
</section>