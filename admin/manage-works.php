<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_howworks`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
	$oldImage1 = mysqli_real_escape_string($conn, $_POST['oldImage1']);
	$oldImage2 = mysqli_real_escape_string($conn, $_POST['oldImage2']);
	$oldImage3 = mysqli_real_escape_string($conn, $_POST['oldImage3']);

	$image1 = $_FILES['image1']['name'];
	if ($image1 != "") {
		$image1 = time() . "_" . $image1;
		@unlink("../uploads/works/" . $oldImage1);
		move_uploaded_file($_FILES["image1"]["tmp_name"], "../uploads/works/" . $image1);
	} else {
		$image1 = $oldImage1;
	}

	$image2 = $_FILES['image2']['name'];
	if ($image2 != "") {
		$image2 = time() . "_" . $image2;
		@unlink("../uploads/works/" . $oldImage2);
		move_uploaded_file($_FILES["image2"]["tmp_name"], "../uploads/works/" . $image2);
	} else {
		$image2 = $oldImage2;
	}

	$image3 = $_FILES['image3']['name'];
	if ($image3 != "") {
		$image3 = time() . "_" . $image3;
		@unlink("../uploads/works/" . $oldImage3);
		move_uploaded_file($_FILES["image3"]["tmp_name"], "../uploads/works/" . $image3);
	} else {
		$image3 = $oldImage3;
	}

	$query = mysqli_query($conn, "UPDATE `tbl_howworks` SET `image1`='$image1',`image2`='$image2',`image3`='$image3'");
	if ($query == true) {
		$_SESSION['success'] = "Updated Successfully";
		header("refresh:3;url=manage-works.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Extra Images Management</a></li>
			<li class="breadcrumb-item active">Edit Extra Images</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
				class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
					class="fa fa-arrow-left"></i></a> Manage Extra Images</h1>
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
						<h4 class="panel-title"> Edit Extra Images</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">

								<div class="row">

									<div class="col-4">
										<div class="form-group">
											<label for="exampleInputFile">Faq Image</label>
											<input type="file" name="image1" class="form-control" id="exampleInputFile">
											<input type="hidden" name="oldImage1" value="<?= $brec['image1']; ?>">
											<p class="help-block">Image dimension must be 570 × 569 px & must be jpg
												format</p>
											<img src="../uploads/works/<?= $brec['image1']; ?>"
												style="width:30%; height:100px" class="bg-dark">
										</div>
									</div>

									<div class="col-4">
										<div class="form-group">
											<label for="exampleInputFile">Faq Page Image</label>
											<input type="file" name="image3" class="form-control" id="exampleInputFile">
											<input type="hidden" name="oldImage3" value="<?= $brec['image3']; ?>">
											<p class="help-block">Image dimension must be 570 × 569 px & must be jpg
												format</p>
											<img src="../uploads/works/<?= $brec['image3']; ?>"
												style="width:30%; height:100px" class="bg-dark">
										</div>
									</div>

									<div class="col-4">
										<div class="form-group">
											<label for="exampleInputFile">Contact Image</label>
											<input type="file" name="image2" class="form-control" id="exampleInputFile">
											<input type="hidden" name="oldImage2" value="<?= $brec['image2']; ?>">
											<p class="help-block">Image dimension must be 570 × 569 px & must be jpg
												format</p>
											<img src="../uploads/works/<?= $brec['image2']; ?>"
												style="width:30%; height:100px" class="bg-dark">
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