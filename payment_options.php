<div class="box">
    <?php
    $session_email = $_SESSION['customer_email'];
    $select_customer = "select * from customers where customer_email='$session_email'";
    $run_cust = mysqli_query($con, $select_customer);
    $row_customer = mysqli_fetch_array($run_cust);
    $customer_id = $row_customer['customer_id'];

    ?>





    <h1 class="text-center">Payment Options</h1>
    <p class="lead text-center">
        <a href="order.php?c_id=<?php echo $customer_id ?>">Pay Offline</a>
    </p>


    <center>
        <p class="lead">
            <a href="#">Pay with Paypal
                <img src="images/paypal.jpg" width="500" height="270" class="img-responsive"></a>
        </p>
    </center>
</div>