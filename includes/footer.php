<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>  Pages </h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="../ecomm/customers/my_account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>  Users Section </h4>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="customer_registration.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>





            <div class="col-md-3 col-sm-6">
                <h4>Top Product Categories</h4>
                <ul>
                   <?php
                    $get_p_cats = "select * from product_category";
                    $run_p_cats = mysqli_query($con, $get_p_cats);
                    while ($row_p_cat = mysqli_fetch_array($run_p_cats)) {
                        $p_cat_id = $row_p_cat['p_cat_id'];
                        $p_cat_title = $row_p_cat['p_cat_title'];

                        echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
                    }
                   ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>



            <div class="col-md-3 col-sm-6">
                <h4>Where to Find Us</h4>
                <p id="det">
                    <strong>Fashion_Hub.com</strong>
                    <br> Vashali Nagar
                    <br> Ajmer
                    <br> Rajasthan
                    <br> fashion_hub@gmail.com
                    <br> +91 9079633215
                </p>
                
                <hr class="hidden-md hidden-lg">
            </div>




            <div class="col-md-3 col-sm-6">
                <div class="text-muted">
                    <p id="sub">Subscribe here for getting news of fashion_hub </p>
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="email" class="form-control">
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-default" value="subscribe">
                            </span>
                        </div>
                    </form>
                    <hr>
                    <h4>Follow us : </h4>
                    <p class="social">
                        <a href="www.facebook.com"><i class="fa fa-facebook"></i></a>
                        <a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
                        <a href="www.instagram.com"><i class="fa fa-instagram"></i></a>
                        <a href="www.googleplus.com"><i class="fa fa-google-plus"></i></a>
                        <a href="www.envelope.com"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2021_Fashion_hub Team
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Template By: <a href="www.fahion_hub.com">Fashion_hub.com</a>
            </p>
        </div>
    </div>
</div>






<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>