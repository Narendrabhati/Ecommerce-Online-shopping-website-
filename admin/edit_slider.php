<?php

if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
?>





<?php

if(isset($_GET['edit_slide'])) {

$edit_id = $_GET['edit_slide'];

$edit_slide = "select * from slider where slider_id='$edit_id'";

$run_edit = mysqli_query($con,$edit_slide);

$row_edit = mysqli_fetch_array($run_edit);

$slide_id = $row_edit['slider_id'];

$slide_name = $row_edit['slider_name'];

$slide_image = $row_edit['slider_image'];

}

?>









<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Edit slide
            </li>
        </ol>
    </div>
</div>





<div class="row" id="box">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit slide
                </h3>
            </div>





            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Slider Name:</label>
                        <div class="col-md-6">
                        <input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name; ?>">
                    </div>
                    </div>








                    <div class="form-group">
                        <label class="col-md-3 control-label">Slide Image:</label>
                        <div class="col-md-6">
                        <input type="file" name="slide_image" class="form-control">
                        <br>
                        <img src="images/slider/<?php echo $slide_image; ?>" width="70" height="70">
                    </div>
                    </div>








                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>















<?php
if(isset($_POST['update'])) {

$slide_name = $_POST['slide_name'];

$slide_image = $_FILES['slide_image']['name'];

$temp_name = $_FILES['slide_image']['tmp_name'];

move_uploaded_file($temp_name,"images/slider/$slide_image");

$update_slide = "update slider set slider_name='$slide_name', slider_image='$slide_image' where slider_id='$slide_id'";

$run_slide = mysqli_query($con,$update_slide);

if($run_slide) {
echo "<script>alert('slide has been Updated Successfully') </script>";

echo "<script>window.open('index.php?view_slider','_self') </script>";

}

}

?>


<?php } ?>