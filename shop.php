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
                        <li><a href="contactus.php">Contact Us</a><li>
                    </ul>
                </div>

                <a href="cart.php" class="btn btn-primary navbar-btn right">
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
                    <form action="result.php" class="navbar-form" method="get">
                        <div class="input-group">
                            <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
                            <span class="input-group-btn">
                            <button type="submit" value="search" name="search" class="btn btn-primary">
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















<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>





        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");
            ?>
        </div>





        <div class="col-md-9">
            <?php
                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat_id'])) {
                        echo "<div class='box'>
                            <h1>Shop</h1>
                                <p>Fashion_hub Shop page.</p></div>";
                    }
                }
            ?>



            <div class="row">
               <?php
                     if (!isset($_GET['p_cat'])) {
                        if (!isset($_GET['cat_id'])) {
                           

                            $per_page = 6;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $start_from = ($page-1) * $per_page;
                                $get_product = "select * from products order by 1 DESC LIMIT $start_from, $per_page";
                                $run_pro = mysqli_query($con, $get_product);
                                    while ($row = mysqli_fetch_array($run_pro)) {
                                        $pro_id = $row['product_id'];
                                        $pro_title = $row['product_title'];
                                        $pro_price = $row['product_price'];
                                        $pro_img1 = $row['product_img1'];
                                        
                                        echo "<div class='col-md-4 col-sm-6 center-responsive'>
                                                <div class='product box same-height'>
                                                    <a herf='details.php?pro_id=$pro_id'>
                                                        <img src='admin/product_images/$pro_img1' class='img-responsive'>
                                                    </a>



                                                        <div class='text'>
                                                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                            <p class='price'>INR $pro_price</p>
                                                            <p class='buttons'>
                                                                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                                    <i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                                                
                                                            </p>
                                                        </div>
                                                </div>
                                              </div>";
                                    }
                               
               ?>
            </div>






            <center>
                <ul class="pagination">
                    
                   <?php
                        $query = "select * from products";
                        $result = mysqli_query($con, $query);
                        $total_record  = mysqli_num_rows($result);
                        $total_pages = ceil($total_record / $per_page);

                        echo "<li><a href='shop.php?page=1'> " . 'First Page' . "</a></li>";


                        for ($i=1; $i<=$total_pages; $i++) {
                            echo "<li><a href='shop.php?page=".$i."'> ".$i." </a></li>";
                        };

                        echo "<li><a href='shop.php?page=$total_pages'> " . 'Last Page' . " </a></li>";
                    }
                }
                   ?>
            
                </ul>
            </center>

            
                <?php
                    getPcatPro();
                    getCatPro();
                ?>
        
        </div>

    </div>
</div>













<?php
include("includes/footer.php");
?>