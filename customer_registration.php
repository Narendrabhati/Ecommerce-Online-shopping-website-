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
                    <li><a href="checkout.php">My Account</a></li>
                    <li><a href="cart.php">Goto Cart &nbsp;</a></li>
                    


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
                        <li><a href="customers/my_account.php">My Account</a></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
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
                <li>Registration</li>
            </ul>
        </div>





        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");
            ?>
        </div>





        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Create A New Account</h2>
                    </center>
                </div>



                <form action="customer_registration.php" method="post" enctype="multipart-form-data">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="c_name" required="" class="form-control">
                    </div>




                    <div class="form-group">
                        <label>Customer Email</label>
                        <input type="text" name="c_email" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="c_password" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="c_country" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="c_city" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="number" name="c_contact" class="form-control" required="">
                    </div>




                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="c_address" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="c_image" class="form-control" required="">
                    </div>




                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>




    </div>
</div>





<?php
include("includes/footer.php");
?>





<?php 
    if (isset($_POST['submit'])) {
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_password = $_POST['c_password'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_tmp_image = $_FILES['c_image']['tmp_name'];
        $c_ip = getUserIP();

        move_uploaded_file($c_tmp_image, "customers/customer_images/$c_image");

        $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, 
            customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip)
                values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

        $run_customer = mysqli_query($con, $insert_customer);
        $sel_cart = "select * from cart where ip_add='$c_id'";
        $run_cart = mysqli_query($con, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart > 0) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";

        } else {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>