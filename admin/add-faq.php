<?php
require('checksession.php');
include '../inc/function.php'; 

if(isset($_POST['submit']))
{  
	$category_id = mysqli_real_escape_string($conn,$_POST['category_id']);	
	$faq_question = mysqli_real_escape_string($conn,$_POST['faq_question']);	
	$faq_answer = mysqli_real_escape_string($conn,$_POST['faq_answer']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']);
	$sort = mysqli_real_escape_string($conn,$_POST['sort']);	
		
		$query=mysqli_query($conn,"INSERT INTO `faq_table` (`faq_question`, `faq_answer`, `status`, `sort`, `category_id`) VALUES ('$faq_question', '$faq_answer', '$status', '$sort', '$category_id')");
		if($query==true)
		{
		$_SESSION['success']="Inserted successfully";
		header("refresh:3;url=manage-faq.php");	
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
				<li class="breadcrumb-item"><a href="javascript:;">Faq Management</a></li>
				<li class="breadcrumb-item active">Add Faq</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Add Faq</h1>
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
							<h4 class="panel-title">Add Faq</h4>
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
							<label for="heading">FAQ Question</label>
							<input type="text"  name="faq_question" class="form-control" placeholder="Enter FAQ Question">
						</div>
				  </div>

             	  <div class="col-sm-12">
						<div class="form-group">
							<label for="heading">FAQ Answer</label>
							<textarea name="faq_answer" class="form-control" id="editor1" placeholder="Enter FAQ Answer"></textarea>
						</div>
				  </div>
			  </div>

				<div class="form-group">
                  <label for="bannerlink">Position</label>
                  <input type="number"  name="sort"  placeholder="1-10" class="form-control" id="bannerlink">
                 
                </div>
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
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
