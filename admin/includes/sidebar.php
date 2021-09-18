<?php
    if(!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    }else {
    
?>




<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>











<!---------------- nav navbar-right top-nav ------------------>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $admin_name ?>
            </a>


            <ul class="dropdown-menu">
        <li>
            <a href="index.php?user_profile?id=<?php echo $admin_id ?>">
                <i class="fa fa-user"></i> Profile
            </a>
        </li>



        <li>
            <a href="index.php?view_product">
                <i class="fa fa-envelope"></i> Products
                    <span class="badge"><?php echo $count_pro ?></span>
            </a>
        </li>




        <li>
            <a href="index.php?view_customer">
                <i class="fa fa-users"></i> Customer
                <span class="badge"><?php echo $count_cust ?></span>
            </a>
        </li>




        <li>
            <a href="index.php?pro_cat">
                <i class="fa fa-gear"></i> Product Categories
                <span class="badge"><?php echo $count_p_cat ?></span>
            </a>
        </li>



        <li class="divider"></li>



        <li>
            <a href="logout.php">
                <i class="fa fa-power-off"></i> Logout</a>
        </li>
    </ul>




        </li>
    </ul>
<!------------ END-of-nav navbar-right top-nav ----------------------->






<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav sidebar-nav">
        <li>
            <a href="index.php?dashboard">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>    
        </li>






<!-------------------------- products-dropdown ------------------------------------>
        <li>
            <a href="#" data-toggle="collapse" data-target="#products">
                <i class="fa fa-table"></i> Product
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="products">
                <li>
                    <a href="index.php?insert_product">Insert Product</a>
                </li>


                <li>
                    <a href="index.php?view_product">View Product</a>
                </li>
            </ul>
        </li>







        <li>
            <a href="#" data-toggle="collapse" data-target="#product_cat">
                <i class="fa fa-table"></i> Product Categories
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="product_cat">
                <li>
                    <a href="index.php?insert_product_cat">Insert Product Categories</a>
                </li>


                <li>
                    <a href="index.php?view_product_cat">View Product Categories</a>
                </li>
            </ul>
        </li>








        <li>
            <a href="#" data-toggle="collapse" data-target="#category">
                <i class="fa fa-table"></i> Categories
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="category">
                <li>
                    <a href="index.php?insert_categories">Insert Categories</a>
                </li>


                <li>
                    <a href="index.php?view_categories">View Categories</a>
                </li>
            </ul>
        </li>








        <li>
            <a href="#" data-toggle="collapse" data-target="#slider">
                <i class="fa fa-table"></i> Slider
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="slider">
                <li>
                    <a href="index.php?insert_slider">Insert slider</a>
                </li>


                <li>
                    <a href="index.php?view_slider">View slider</a>
                </li>
            </ul>
        </li>









        
        <li>
            <a href="#" data-toggle="collapse" data-target="#boxes">
                <i class="fa fa-arrows"></i> Boxes Section
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="boxes">
                <li>
                    <a href="index.php?insert_box">Insert Box</a>
                </li>


                <li>
                    <a href="index.php?view_box">View Box</a>
                </li>
            </ul>
        </li>
<!---------------- END-of-products-dropdown --------------->      



        <li>
            <a href="index.php?view_customer">
                <i class="fa fa-edit"></i> View Customer
            </a>
        </li>




        <li>
            <a href="index.php?view_orders">
                <i class="fa fa-list"></i> View Orders
            </a>
        </li>





        <li>
            <a href="index.php?view_payments">
                <i class="fa fa-pencil"></i> View Payments
            </a>
        </li>





        <li>
            <a href="#" data-toggle="collapse" data-target="#users">
                <i class="fa fa-table"></i> Users
                    <i class="fa fa-caret-down"></i>
            </a>
            <ul class="collapse" id="users">
                <li>
                    <a href="index.php?insert_user">Insert User</a>
                </li>


                <li>
                    <a href="index.php?view_users">View Users</a>
                </li>

                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">Edit Profile</a>
                </li>
            </ul>
        </li>



    </ul>
</div>
   
</nav>




<?php } ?>