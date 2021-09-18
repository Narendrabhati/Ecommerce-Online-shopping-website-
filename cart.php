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
                <li>Cart</li>
            </ul>
        </div>




<!--------------  Shpping-cart-order-details-section  ---------------------->

        <div class="col-md-9" id="cart">
            <div class="box">
                <form action="cart.php" method="post" enctype="multipart-form-data">

                    <h1>Shopping Cart</h1>

                        <?php
                             $ip_add = getUserIP();
                             $select_cart = "select * from cart where ip_add='$ip_add'";
                             $run_cart = mysqli_query($db, $select_cart);
                             $count = mysqli_num_rows($run_cart);
                        ?>


                        <p class="text-muted">Currently You Have <?php echo $count ?> items in Your Cart</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Size</th>
                                            <th colspan="1">Delete</th>
                                            <th colspan="1">Sub Total</th>
                                        </tr>
                                    </thead>



                                <tbody>

                                    <?php
                                    $total = 0;
                                        while ($row = mysqli_fetch_array($run_cart)) {
                                            $pro_id = $row['p_id'];
                                            $pro_size = $row['size'];
                                            $pro_qty = $row['qty'];
                                            $get_product = "select * from products where product_id='$pro_id'"; 
                                            $run_pro = mysqli_query($con, $get_product);
                                            
                                            while($row = mysqli_fetch_array($run_pro)) {
                                                $p_title = $row['product_title'];
                                                $p_img1 = $row['product_img1'];
                                                $p_price = $row['product_price'];
                                                $sub_total = $row['product_price'] * $pro_qty;
                                                $total += $sub_total;
                                    ?>
                                        <tr>
                                            <td><img src="admin/product_images/<?php echo $p_img1 ?>" alt=""></td>
                                            <td><?php echo $p_title ?></td>
                                            <td><?php echo $pro_qty ?></td>
                                            <td><?php echo $p_price ?></td>
                                            <td><?php echo $pro_size ?></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                            <td><?php echo $sub_total ?></td>
                                        </tr>
                                        <?php } } ?>
                                    
                                    </tfoot>
                                </table>
                            </div>





                            <div class="box-footer">
                                <div class="pull-left">
                                    <h4>Total Price</h4>
                                </div>



                                <div class="pull-right">
                                    <h4>INR &nbsp;<?php echo $total ?></h4>
                                </div>
                            </div>











                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                    </a>
                                </div>



                                <div class="pull-right">
                                    <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                                        <i class="fa fa-refresh">Update Cart</i>
                                    </button>
                                    <a href="checkout.php" class="btn btn-primary">
                                        Proceed to Checkout <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>




                    <?php
                        function update_cart() {
                            global $con;

                            if (isset($_POST['update'])) {
                                foreach ($_POST['remove'] as $remove_id) {
                                    $delete_product =  "delete from cart where p_id='$remove_id'";
                                    $run_del = mysqli_query($con, $delete_product);
                                    if ($run_del) {
                                        echo  "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                        }

                        echo @$up_cart = update_cart();
                    ?>
<!--------------  END-of-shopping-cart-order-details-section  ---------------------->







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







<!--------------  Order-Summary-section  ---------------------->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order Summary</h3>
                        </div>
                        <p class="text-muted">
                            Shoppind and additional costs are calculated based on the values you have entered
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <th>₹ <?php echo $total ?></th>
                                    </tr>


                                    <tr>
                                        <td>Shopping and handling</td>
                                        <td>INR 0</td>
                                    </tr>


                                    <tr>
                                        <td>Tax</td>
                                        <td>INR 0</td>
                                    </tr>


                                    <tr class="total">
                                        <td>Total</td>
                                        <td>₹  <?php echo $total ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<!--------------  END-of-order-summary-section  ---------------------->




            </div>
        </div>



       










<?php
include("includes/footer.php");
?>