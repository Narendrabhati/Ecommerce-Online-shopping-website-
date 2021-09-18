<?php
session_start();
include("includes/db.php");
//include("includes/header.php");
include("functions/functions.php");
?>






<?php
if (isset($_GET['pro_id'])) {
    $pro_id = $_GET['pro_id'];
    $get_product = "select * from products where product_id='$pro_id'";
    $run_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $p_title = $row_product['product_title'];
    $p_price = $row_product['product_price'];
    $p_desc = $row_product['product_desc'];
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];

    $get_p_cat = "select * from product_category where p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con,$get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_id = $row_p_cat['p_cat_id'];
    $p_cat_title = $row_p_cat['p_cat_title'];
}
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
                <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> 
                    <?php echo $p_cat_title ?></a></li>

                    <?php echo $p_title ?></li>
            </ul>
        </div>





        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");
            ?>
        </div>


<!--------------  slider  ---------------------->
        <div class="col-md-9">
            <div class="row" id="productmain">
                <div class="col-sm-6">
                    <div id="mainimage">
                        <div id="mycarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#mycarousel" data-slide-to="2"></li>
                                
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img src="admin/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                                    </center>
                                </div>


                                <div class="item">
                                    <center>
                                        <img src="admin/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                                    </center>
                                </div>


                                <div class="item">
                                    <center>
                                        <img src="admin/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                                    </center>
                                </div>
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






<!--------------  Details & quantity-section  ---------------------->

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $p_title ?></h1>



                            <?php
                                addCart();
                            ?>



                                <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Product Quantity</label>
                                            <div class="col-md-7">
                                                <select name="product_qty" class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                        </div>
                                    </div>
                        


                        <div class="form-group">
                            <label class="col-md-5 control-label">Product Size</label>
                            <div class="col-md-7">
                                <select name="product_size" class="form-control">
                                    <option>Size</option>
                                    <option>Small (S)</option>
                                    <option>Medium (M)</option>
                                    <option>Large (L)</option>
                                    <option>Extra Large (XL)</option>
                                    <option>Extra-Extra Large (XXL)</option>
                                </select>
                            </div>
                        </div>


                        <p class="price">INR <?php echo $p_price ?></p>
                        <p class="text-center buttons">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-shopping-cart">Add to Cart</i>
                            </button>
                        </p>
                    </form>
                    </div>

<!--------------  END-of-details & quantity-section  ---------------------->






<!--------------  Similar-images-section  ---------------------->
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img1 ?>" class="img-responsive">
                        </a>
                    </div>




                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img2 ?>" class="img-responsive">
                        </a>
                    </div>


                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img3 ?>" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>

<!--------------  END-of-similar-image-section  ---------------------->






<!--------------  Product-details-section  ---------------------->
            <div class="box" id="details">
                <h4>Product Details</h4>
                    <?php echo $p_desc ?>
                <h4>Size :-</h4>
                    <ul>
                        <li>Small (S)</li>
                        <li>Large (L)</li>
                        <li>Extra Large (XL)</li>
                        <li>Extra-Extra Large (XXL)</li>
                    </ul>
            </div>
<!--------------  END-of-product-details-section  ---------------------->









<!--------------  Also-like-these-section  ---------------------->
            <div id="row" class="same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">You Will Also Like These Products</h3>
                    </div>
                </div>





                <?php
                     $get_product = "select * from products order by 1 LIMIT 0,3";
                     $run_product = mysqli_query($con, $get_product);
                        while ($row = mysqli_fetch_array($run_product)) {
                             $pro_id = $row['product_id'];
                             $product_title = $row['product_title'];
                             $product_price = $row['product_price'];
                             $product_img1 = $row['product_img1'];


          echo "<div class='center-responsive col-md-3 col-sm-6'>
                    <div class='product same-height'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin/product_images/$product_img1' class='img-responsive'>
                        </a>
                        
                        
                    
                        <div class='text'>
                            <h3><a href='details.php?pro_id=$pro_id'>$product_title </a></h3>
                                <p class='price'> INR $product_price </p>
                                    <p class='buttons'>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                            <i class='fa fa-shopping-cart'> </i> Add to Cart </a>
                                    </p>
                        </div>
                    </div>
                    
                </div>";
                        }
                ?>
            </div>
<!--------------  END-of-also-like-these-section  ---------------------->







        </div>
    </div>
</div>




        
<?php
include("includes/footer.php");
?>