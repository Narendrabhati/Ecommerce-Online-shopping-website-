<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {



include("../customers/includes/db.php");

include("../customers/functions/functions.php");

//include("../customers/includes/header.php");
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
                <a href="#">Shopping Cart Total Price: INR 100, Total Items 2</a>
            </div>

            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="../customer_registration.php">Register</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="../cart.php">Goto Cart</a></li>
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
                <a href="../index.php" class="navbar-brand home">
                    <img src="images/logof.png" alt="fashion_hub" class="hidden-xs" id="log">
                    <img src="images/logos.png" alt="fashion_hub" class="visible-xs" id="log1">
                </a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="">
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
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../shop.php">Shop</a></li>
                        <li><a href="my_account.php">My Account</a></li>
                        <li><a href="../cart.php">Shopping Cart</a></li>
                        <li><a href="../contactus.php">Contact Us</a></li>
                    </ul>
                </div>

                <a href="cart.php" class="btn btn-primary navbar-btn right">
                    <i class="fa fa-shopping-cart"></i>
                    <span>4 items in cart</span>
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
                <li><a href="home.php">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>





        <div class="col-md-3">
            <?php
                include("../customers/includes/sidebar.php");
            ?>
        </div>


        <div class="col-md-9">
<!--------------  Including-my_orders.php page  ---------------------->
            <?php
                if(isset($_GET['my_orders'])){
                    include("my_orders.php");
                }
            ?>
<!--------------  END-of-my-orders.php page  ---------------------->




<!--------------  Including-Pay_offline.php page  ---------------------->
<?php
                if(isset($_GET['pay_offline'])){
                    include("pay_offline.php");
                }
            ?>
<!--------------  END-of-pay_offline.php page  ---------------------->




<!--------------  Including-edit_act.php page  ---------------------->
<?php
                if(isset($_GET['edit_act'])){
                    include("edit_act.php");
                }
            ?>
<!--------------  END-of-edit_act.php page  ---------------------->



<!--------------  Including-change_password.php page  ---------------------->
<?php
                if(isset($_GET['change_pass'])){
                    include("change_password.php");
                }
            ?>
<!--------------  END-of-change_password.php page  ---------------------->




<!--------------  Including-delete_act.php page  ---------------------->
<?php
                if(isset($_GET['delete_act'])){
                    include("delete_act.php");
                }
            ?>
<!--------------  END-of-delete_act.php page  ---------------------->
        </div>





    </div>
</div>

        






<?php
include("../customers/includes/footer.php");
?>




<?php } ?>