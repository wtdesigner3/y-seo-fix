<?php
require('checksession.php');
include '../inc/function.php'; 

if(isset($_POST['submit']))
{  
	$category_id = mysqli_real_escape_string($conn,$_POST['category_id']);	
	$heading = mysqli_real_escape_string($conn,$_POST['heading']);	
	$card_heading1 = mysqli_real_escape_string($conn,$_POST['card_heading1']);	
	$card_heading2 = mysqli_real_escape_string($conn,$_POST['card_heading2']);	
	$card_heading3 = mysqli_real_escape_string($conn,$_POST['card_heading3']);	
	$card_content1 = mysqli_real_escape_string($conn,$_POST['card_content1']);	
	$card_content2 = mysqli_real_escape_string($conn,$_POST['card_content2']);	
	$card_content3 = mysqli_real_escape_string($conn,$_POST['card_content3']);	
		
		$query=mysqli_query($conn,"INSERT INTO `why_choose` (`category_id`, `heading`, `card_heading1`, `card_heading2`, `card_heading3`, `card_content1`, `card_content2`, `card_content3`) VALUES ('$category_id', '$heading', '$card_heading1', '$card_heading2', '$card_heading3', '$card_content1', '$card_content2', '$card_content3')");
		if($query==true)
		{
		$_SESSION['success']="Inserted successfully";
		header("refresh:3;url=manage-why-choose.php");	
		}
		else 
		{
		// Message for unsuccessfull insertion
		$_SESSION['error']="Something went wrong. Please try again";
		} 
}
?>   

<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Why Choose Management</a></li>
				<li class="breadcrumb-item active">Add Why Choose</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Add Why Choose</h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-10 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Add Why Choose</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             <div class="row">

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Category Name</label>
							<select name="category_id" class="form-control">
								<option value="">Select Category</option>
								<?php
								$query=mysqli_query($conn,"select * from `categories` WHERE `status` = '1'");
								while($row=mysqli_fetch_array($query))
								{
								?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
								<?php
								}
								?>
							</select>
						</div>
				  </div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Why Choose Heading</label>
							<input type="text"  name="heading" class="form-control" placeholder="Enter Why Choose Heading">
						</div>
				  </div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Card Heading 1</label>
							<input type="text"  name="card_heading1" class="form-control" placeholder="Enter Card Heading 1">
						</div>
				  </div>

             	  <div class="col-6">
						<div class="form-group">
							<label for="heading">Card Content 1</label>
							<textarea name="card_content1" class="form-control" placeholder="Enter Card Content 1"></textarea>
						</div>
				  </div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Card Heading 2</label>
							<input type="text"  name="card_heading2" class="form-control" placeholder="Enter Card Heading 2">
						</div>
				  </div>

             	  <div class="col-6">
						<div class="form-group">
							<label for="heading">Card Content 2</label>
							<textarea name="card_content2" class="form-control" placeholder="Enter Card Content 2"></textarea>
						</div>
				  </div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Card Heading 3</label>
							<input type="text"  name="card_heading3" class="form-control" placeholder="Enter Card Heading 3">
						</div>
				  </div>

             	  <div class="col-6">
						<div class="form-group">
							<label for="heading">Card Content 3</label>
							<textarea name="card_content3" class="form-control" placeholder="Enter Card Content 3"></textarea>
						</div>
				  </div>

			  </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
                <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                
              </div>
            </form>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->	
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php require("includes/footer.php"); ?>
	
<script>
$(document).ready(function() {
	App.init();
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
CKEDITOR.replace('editor2', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
});
</script>
<!------------------------>
<!------------------------------>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

</body>
</html>
