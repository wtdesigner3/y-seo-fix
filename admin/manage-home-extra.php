<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_home_extra`");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {

	$prd_mini_heading = mysqli_real_escape_string($conn, $_POST['prd_mini_heading']);
	$prd_heading = mysqli_real_escape_string($conn, $_POST['prd_heading']);
	$prd_subheading = mysqli_real_escape_string($conn, $_POST['prd_subheading']);
	$connect_mini_heading = mysqli_real_escape_string($conn, $_POST['connect_mini_heading']);
	$connect_heading = mysqli_real_escape_string($conn, $_POST['connect_heading']);
	$connect_text = mysqli_real_escape_string($conn, $_POST['connect_text']);

	$query = mysqli_query($conn, "UPDATE `tbl_home_extra` SET `prd_mini_heading`='$prd_mini_heading',`prd_heading`='$prd_heading',`prd_subheading`='$prd_subheading',`connect_mini_heading`='$connect_mini_heading',`connect_heading`='$connect_heading',`connect_text`='$connect_text'");

	if ($query == true) {
		$_SESSION['success'] = "Updated Successfully";
		header("refresh:3;url=manage-home-extra.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Home Extra Management</a></li>
			<li class="breadcrumb-item active">Edit Home Extra</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
				class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
					class="fa fa-arrow-left"></i></a> Manage Home Extra</h1>
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
						<h4 class="panel-title"> Edit Home Extra</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="banner"> Enter Product Mini Heading</label>
											<input type="text" name="prd_mini_heading" class="form-control" id=""
												value="<?= $brec['prd_mini_heading']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="banner"> Enter Product Heading</label>
											<input type="text" name="prd_heading" class="form-control" id=""
												value="<?= $brec['prd_heading']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="banner"> Enter Product Sub Heading</label>
											<input type="text" name="prd_subheading" class="form-control" id=""
												value="<?= $brec['prd_subheading']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="banner"> Enter Connect Mini Heading</label>
											<input type="text" name="connect_mini_heading" class="form-control" id=""
												value="<?= $brec['connect_mini_heading']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="banner"> Enter Connect Heading</label>
											<input type="text" name="connect_heading" class="form-control" id=""
												value="<?= $brec['connect_heading']; ?>">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="banner"> Enter Connect Text</label>
											<textarea name="connect_text" class="form-control" id="editor1"
											><?= $brec['connect_text']; ?></textarea>
										</div>
									</div>

								</div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" name="update" class="btn btn-primary">Click Here To
									Update</button>
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