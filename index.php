<?php
session_start();
include("includes/db.php");
//include("includes/header.php");
include("functions/functions.php");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion_hub</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">


</head>
<body>


<!--------------  Top-bar  ---------------------->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    
                <?php 
                        if (!isset($_SESSION['customer_email'])) {
                            echo "Welcome Guest";
                        } else {
                            echo "Welcome:" . $_SESSION['customer_email'] . "";
                        }
                    ?>
                </a>
                <a href="#">Shopping Cart Total Price: INR <?php total_price(); ?>, Total Items <?php item(); ?></a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_registration.php">Register</a></li>
                    <li>
                        <?php 
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customers/my_account.php?my_orders'>My Account</a>";
                            }
                        ?>
                    </li>
                    <li><a href="cart.php">Goto Cart</a></li>
                    

                    <li>
                        <?php 
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a>";
                            } else {
                                echo "<a href='logout.php'>Logout</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>

<!--------------  END-of-Top-bar  ---------------------->






<!--------------  Navigation-bar  ---------------------->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <!--------------  Navbar-header  ---------------------->
         
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <img src="images/logof.png" alt="fashion_hub" class="hidden-xs" id="log">
                    <img src="images/logos.png" alt="fashion_hub" class="visible-xs" id="log1">
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"></span>
                        <i class="fa fa-search"></i>
                    </button>
            </div>
            <!--------------  END-of-Navbar-header  ---------------------->




            <!--------------  Navbar-collapse start  ---------------------->
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li>
                            <?php 
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customers/my_account.php?my_orders'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                    </ul>
                </div>

                <a href="cart.php" class="btn btn-primary navbar-btn left">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php item(); ?> items in cart</span>
                </a>


                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only"> Toggle Search </span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>



                <div class="collapse clearfix" id="search">
                    <form action="shop.php" class="navbar-form" method="POST">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required="" id="search">
                            <span class="input-group-btn">
                            <button type="submit" value="search" name="search" id="search" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                </div>





            </div>
            <!--------------  END-of-navbar-collapse ---------------------->
        </div>
    </div>
<!--------------  ENF-od-Navigation-bar  ---------------------->





<!--------------  Slider  ---------------------->
    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="mycarousel" data-rate="carousel">
                <ol class="carousel-indicators">
                    <li data-target="mycarousel" data-slide-to="0" class="action"></li>
                    <li data-target="mycarousel" data-slide-to="1"></li>
                    <li data-target="mycarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    

                    <?php
                        $get_slider = "select * from slider LIMIT 0,1";  //LIMIT=taking limited data from 1-3
                        $run_slider = mysqli_query($con, $get_slider);
                        while ($row = mysqli_fetch_array($run_slider)){
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item active'> 
                                <img src='admin/images/slider/$slider_image'>
                            </div>";
                        }
                    ?>



                    <?php
                        $get_slider = "select * from slider LIMIT 1,3";  
                        $run_slider = mysqli_query($con, $get_slider);
                        while ($row = mysqli_fetch_array($run_slider)){
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            echo "<div class='item'> 
                                <img src='admin/images/slider/$slider_image'>
                            </div>";
                        }
                    ?>



                </div>


                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>




                            <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>


            </div>
        </div>
    </div>
<!--------------  END-of-slider  ---------------------->








<!--------------  Three-box-section  ---------------------->
    <div id="advantage">
        <div class="container">
            <div class="same-height-row">



                            <?php
                                $get_boxes = "select * from boxes_section";
                                $run_box = mysqli_query($con,$get_boxes);
                                while($row = mysqli_fetch_array($run_box)) {


                                    $box_id = $row['box_id'];
                                    $box_title = $row['box_title'];
                                    $box_desc = $row['box_desc'];
                            ?>





                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="shop.php"><?php echo $box_title; ?></a></h3>
                        <p><?php echo $box_desc; ?></p>
                    </div>
                </div>

                        <?php } ?>


            </div>
        </div>
    </div>
<!--------------  END-of-three-box-section  ---------------------->









<!--------------  Three-box-section  ---------------------->
    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>This Week Latest Product</h2>
                </div>
            </div>
        </div>
    </div>
<!--------------  Three-box-section  ---------------------->









<!--------------  Product-section  ---------------------->
    <div id="content" class="container">
        <div class="row">
                <?php
                 getPro();
                ?>
        </div>
    </div>
<!--------------  END-of-Product-section  ---------------------->








<!--------------  Footer-section  ---------------------->
    <?php
        include("includes/footer.php");
    ?>
<!--------------  END-of-Footer-section  ---------------------->









<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>









