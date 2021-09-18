<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {


include("../customers/includes/db.php");

include("../customers/functions/functions.php");

//include("../customers/includes/header.php");


if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];}


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
                    <li><a href="customer_registration.php">Register</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="cart.php">Goto Cart</a></li>
                    <li><a href="login.php">Login</a></li>
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
                        <li><a href="../about.php">About Us</a></li>
                        <li><a href="../services.php">Services</a></li>
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
            <div class="box">
                <h1 align="center">Please confirm your payment</h1>
                <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Invoice Number</label>
                        <input type="text" class="form-control" name="invoice_number" required="">
                    </div>



                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" required="">
                    </div>



                    <div class="form-group">
                        <label>Select Payment Method</label>
                            <select class="form-control" name="payment_mode">
                                <option>Bank Transfer</option>
                                <option>UPI Transfer</option>
                                <option>Paypal</option>
                                <option>Paytm</option>
                                <option>PayuMoney</option>
                            </select>
                    </div>




                    <div class="form-group">
                        <label>Transection Number</label>
                        <input type="text" class="form-control" name="trfr_number" required="">
                    </div>



                    <div class="form-group">
                        <label>Payment Date</label>
                        <input type="date" class="form-control" name="date" required="">
                    </div>



                   




                    <div class="text-center">
                        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                            Confirm Payment
                        </button>
                    </div>
                </form>




                <?php
                    if (isset($_POST['confirm_payment'])) {
                        $update_id = $_GET['update_id'];
                        $invoice_number = $_POST['invoice_number'];
                        $amount = $_POST['amount'];
                        $payment_mode = $_POST['payment_mode'];
                        $trfr_number = $_POST['trfr_number'];
                        $date = $_POST['date'];
                        $complete = "Complete";
                        $insert = "insert into payments (invoice_id, amount, payment_mode, ref_no, payment_date)
                            values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";

                        $run_insert=mysqli_query($con, $insert);

                            $update_q = "update customer_order set order_status='$complete' where order_id='$update_id'";
                            $run_insert=mysqli_query($con, $update_q);



                           // $update_q = "update pending_order set order_status='$complete' where order_id='$update_id'";
                            //$run_insert=mysqli_query($con, $update_q);
                    

                            echo "<script>alert('Your order has been recieved')</script>";
                            echo "<script>window.open('my_account.php?order','_self')</script>";
                    }
                ?>
            </div>
        </div>






    </div>
</div>

        






<?php
include("../customers/includes/footer.php");
?>



<?php } ?>