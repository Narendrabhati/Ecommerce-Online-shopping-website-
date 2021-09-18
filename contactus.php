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
                <li>Contact Us</li>
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
                        <h2>Contact Us</h2>
                        <p class="text-muted">If you have any questions, Please feel free to contact us, Our customer
                            service center is working for you 24/7.
                        </p>
                    </center>
                </div>



                <form action="contactus.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required="" class="form-control">
                    </div>




                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required="">
                    </div>



                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="submit" class="form-control" required="">
                    </div>




                    <div class="form-group">
                        <label>Message</label>
                        <textarea type="text" name="message" class="form-control"></textarea>
                    </div>




                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Send Message
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
if ($_POST['submit']) {
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $senderSubject = $_POST['subject'];
    $senderMessage = $_POST['message'];


    $receiverEmail = "Narendrab131@gmail.com";


    mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);
    
    
    //Customer Mail
    $email = $_POST['email'];
    $subject = "Welcome to Fashion_hub";
    $msg = "I shall get you soon, Thanks for sending email";
    $from = "Narendrab131@gmail.com";
    mail($email,$subject,$msg,$from);
    echo "<h2 align='center'>Mail Send</h2>";
}
?>