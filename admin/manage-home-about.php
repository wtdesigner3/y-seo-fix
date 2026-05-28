<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_home_about` WHERE `id` = '1'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {

	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$percent = mysqli_real_escape_string($conn, $_POST['percent']);
	$subheading = mysqli_real_escape_string($conn, $_POST['subheading']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$ach_text = mysqli_real_escape_string($conn, $_POST['ach_text']);
	$oldimage1 = mysqli_real_escape_string($conn, $_POST['oldimage1']);
	$alt = mysqli_real_escape_string($conn, $_POST['alt']);

	$image1 = $_FILES['image1']['name'];
	if ($image1 != "") {
		$image1 = time() . "_" . $image1;
		@unlink("../uploads/about/" . $oldimage1);
		move_uploaded_file($_FILES["image1"]["tmp_name"], "../uploads/about/" . $image1);
	} else {
		$image1 = $brec['image'];
	}


	$query = mysqli_query($conn, "UPDATE `tbl_home_about` SET `image`='$image1',`heading`='$heading',`subheading`='$subheading',`ach_text`='$ach_text',`alt`='$alt',`content`='$content',`percent`='$percent' WHERE `id` = '1'");
	if ($query == true) {
		$_SESSION['success'] = "About Updated Successfully";
		header("refresh:3;url=manage-home-about.php");
	} else {
		$_SESSION['error'] = "Something went wrong. Please try again";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="javascript:;">About Us Management</a></li>
			<li class="breadcrumb-item active">Edit About Us</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
				class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
					class="fa fa-arrow-left"></i></a> Manage About Us</h1>
		<!-- begin row -->
		<div class="row">
			<!-- begin col-10 -->
			<div class="col-lg-12">
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<!-- begin panel-heading -->
					<div class="panel-heading">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
								data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
								data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
								data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
								data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title"> Edit About Us</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
								<div class="row">

									<div class="form-group col-6">
										<label for="banner">Enter Heading</label>
										<input type="text" name="heading" class="form-control"
											value="<?= $brec['heading']; ?>">
									</div>

									<div class="form-group col-6">
										<label for="banner">Enter Subheading</label>
										<input type="text" name="subheading" class="form-control"
											value="<?= $brec['subheading']; ?>">
									</div>

									<div class="form-group col-4 d-none">
										<label for="banner">Enter Achievement Text</label>
										<input type="text" name="ach_text" class="form-control"
											value="<?= $brec['ach_text']; ?>">
									</div>

								</div>

								<div class="form-group ">
									<label for="banner">Enter Content</label>
									<textarea name="content" id="editor1" class="form-control"
										rows="3"><?= $brec['content']; ?></textarea>
								</div>

								<div class="row">

									<div class="col-6">
										<div class="form-group">
											<label for="exampleInputFile">Image 1</label>
											<input type="file" name="image1" class="form-control" id="exampleInputFile">
											<input type="hidden" name="oldimage1" value="<?= $brec['image']; ?>">
											<p class="help-block">Image dimension must be 570 × 569 px & must be jpg
												format</p>
											<img src="../uploads/about/<?= $brec['image']; ?>"
												style="width:30%; height:100px" class="bg-dark">
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label for="banner">Image Alt</label>
											<input type="text" name="alt" class="form-control"
												value="<?= $brec['alt']; ?>">
										</div>
									</div>

									<div class="col-4 d-none">
										<div class="form-group">
											<label for="banner">Percent</label>
											<input type="text" name="percent" class="form-control"
												value="<?= $brec['percent']; ?>">
										</div>
									</div>

								</div>

							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To
									Update</button>
								<!--<button type="reset" name="reset" class="btn btn-danger">Reset</button>-->
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
	<!-- begin scroll to top btn -->
	<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
			class="fa fa-angle-up"></i></a>
	<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<?php require("includes/footer.php"); ?>

	<script>
		$(document).ready(function () {
			App.init();
			initSample();
			CKEDITOR.replace('editor1', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
			CKEDITOR.replace('editor2', {
				filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
			});
		});
	</script>

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
	<script>
		function myGetlink() {
			var x = document.getElementById("myIMG");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

</body>

</html>