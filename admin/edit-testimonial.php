<?php
require('checksession.php');
include '../inc/function.php'; 

$b=$_REQUEST['cid'];
$bdata=mysqli_query($conn,"SELECT * FROM `projects` where `id`='$b'");
$brec=mysqli_fetch_array($bdata);

if(isset($_POST['update']))
{
	$name1 = mysqli_real_escape_string($conn,$_POST['name1']);	
	$name2 = mysqli_real_escape_string($conn,$_POST['name2']);	
	$content = mysqli_real_escape_string($conn,$_POST['content']);	
	$status = mysqli_real_escape_string($conn,$_POST['status']);
	$sort = mysqli_real_escape_string($conn,$_POST['sort']);

	$uploaded_images = array();

	/* Get old images from database */
	$old_images = $_POST['old_images'];

	/* Keep old images */
	if ($old_images != "") {
		$uploaded_images = explode(",", $old_images);
	}

	/* Upload new images */
	if (!empty($_FILES['image']['name'][0])) {
		foreach ($_FILES['image']['name'] as $key => $filename) {
			if ($_FILES['image']['error'][$key] == 0) {
				$tmp_name = $_FILES['image']['tmp_name'][$key];
				/* Create unique file name */
				$new_name = "projects/" . time() . "_" . $filename;
				/* Upload file */
				if (move_uploaded_file($tmp_name, "../uploads/" . $new_name)) {
					$uploaded_images[] = $new_name;
				}
			}
		}
	}

	/* Convert array to string */
	$final_images = implode(",", $uploaded_images);
  
  
   $query=mysqli_query($conn,"UPDATE `projects` SET `image`='$final_images',`name1`='$name1', `name2`='$name2', `content`='$content', `sort`='$sort', `status`='$status' WHERE `id`='$b'");
      if($query==true)
      {
        $_SESSION['success']=" Updated successfully";
		    header("refresh:3;url=manage-testimonial.php");	
      }
      else 
      {
		      $_SESSION['error']="Something went wrong";
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
				<li class="breadcrumb-item"><a href="javascript:;">Projects Management</a></li>
				<li class="breadcrumb-item active">Edit Projects</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Edit Projects</h1>
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
							<h4 class="panel-title">Edit Projects</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
  				<div class="row">

					<div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputFile">Images</label>
							<input type="file" name="image[]" class="form-control" id="exampleInputFile" multiple>
							<p class="help-block">
								Image dimension must be 106 X 106 & must be jpg format
							</p>
							<!-- Old Images -->
							<input type="hidden" name="old_images" value="<?php echo $brec['image']; ?>">
							<?php
							if($brec['image'] != "")
							{
								$images = explode(",", $brec['image']);
								foreach($images as $img)
								{
									?>									
									<img src="../uploads/<?php echo $img; ?>" width="80" height="80" style="margin:5px; border:1px solid #ccc; padding:2px;">
									<?php
								}
							}
							?>
						</div>
					</div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Heading First</label>
							<input type="text"  name="name1" class="form-control" value="<?= $brec['name1']; ?>" placeholder="Enter Heading First">
						</div>
				  </div>

                   <div class="col-sm-6">
						<div class="form-group">
							<label for="heading">Heading Second</label>
							<input type="text"  name="name2" class="form-control" value="<?= $brec['name2']; ?>" placeholder="Enter Heading Second">
						</div>
				  </div>

					<div class="col-sm-12">
							<div class="form-group">
								<label for="heading">Content</label>
								<textarea name="content" class="form-control" id="editor1" placeholder="Enter Content"><?= $brec['content']; ?></textarea>
							</div>
					</div>	

				  </div>

				 <div class="form-group">
                  <label for="bannerlink">Position</label>
                  <input type="number"  name="sort"  value="<?= $brec['sort']; ?>" class="form-control" id="bannerlink">
                </div>

                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
                </div>
             
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
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
