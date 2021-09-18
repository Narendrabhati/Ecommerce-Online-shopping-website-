<?php

if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
?>




<?php
if(isset($_GET['edit_box'])) {

$edit_box = $_GET['edit_box'];

$get_box = "select * from boxes_section where box_id='$edit_box'";

$run_box = mysqli_query($con,$get_box);

$row_box = mysqli_fetch_array($run_box);

$box_id = $row_box['box_id'];

$box_title = $row_box['box_title'];

$box_desc = $row_box['box_desc'];
}
?>






<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Edit Box
            </li>
        </ol>
    </div>
</div>





<div class="row" id="box">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Box
                </h3>
            </div>





            <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Box Title</label>
                        <div class="col-md-6">
                        <input type="text" name="box_title" class="form-control" value="<?php echo $box_title; ?>">
                    </div>
                    </div>








                    <div class="form-group">
                        <label class="col-md-3 control-label">Box Description</label>
                        <div class="col-md-6">
                        <textarea type="text" name="box_desc" row="8" cols="19" id="#mytextarea" class="form-control">
                        <?php echo $box_desc; ?>
                        </textarea>
                    </div>
                    </div>








                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                        <input type="submit" name="submit" value="Update Box" class="btn btn-primary form-control">
                    </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





   
<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>








<?php

if(isset($_POST['submit'])) {

$box_title = $_POST['box_title'];

$box_desc = $_POST['box_desc'];

$update_box = "update boxes_section set box_title='$box_title', box_desc='$box_desc' where box_id='$box_id'";

$run_box = mysqli_query($con,$update_box);

if($run_box) {

echo "<script>alert('Box Information has been Updated Successfully') </script>";

echo "<script>window.open('index.php?view_box','_self') </script>";
 
}

}

?>


<?php } ?>