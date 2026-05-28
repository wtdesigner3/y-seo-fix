<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_become_member` WHERE `id` = '1'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$heading = mysqli_real_escape_string($conn, $_POST['heading']);
	$heading1 = mysqli_real_escape_string($conn, $_POST['heading1']);
	$subheading1 = mysqli_real_escape_string($conn, $_POST['subheading1']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$oldicon = mysqli_real_escape_string($conn, $_POST['oldicon']);
	$list = mysqli_real_escape_string($conn, $_POST['list']);
	$step_heading = json_encode($_POST['step_heading']);
	$step_content = json_encode($_POST['step_content']);

	$icon = $_FILES['icon']['name'];
	if ($icon != "") {
		$icon = time() . "_" . $icon;
		@unlink("../uploads/members/" . $oldicon);
		move_uploaded_file($_FILES["icon"]["tmp_name"], "../uploads/members/" . $icon);
	} else {
		$icon = $brec['icon'];
	}

	$query = mysqli_query($conn, "UPDATE `tbl_become_member` SET `name`='$name',`heading`='$heading',`heading1`='$heading1',`subheading1`='$subheading1',`content`='$content',`icon`='$icon',`list`='$list',`step_heading`='$step_heading',`step_content`='$step_content' WHERE `id` = '1'");
	if ($query == true) {
		$_SESSION['success'] = "Updated Successfully";
		header("refresh:3;url=manage-become-member.php");
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
			<li class="breadcrumb-item"><a href="javascript:;">Become Member Management</a></li>
			<li class="breadcrumb-item active">Edit Become Member</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
				class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
					class="fa fa-arrow-left"></i></a> Manage Become Member</h1>
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
						<h4 class="panel-title"> Edit Become Member</h4>
					</div>
					<!-- begin panel-body -->
					<div class="panel-body">
						<form role="form" method="POST" enctype="multipart/form-data">
							<div class="box-body">
								<div class="row">

									<div class="form-group col-6">
										<label for="banner">Name</label>
										<input type="text" name="name" class="form-control"
											value="<?= $brec['name']; ?>">
									</div>

									<div class="form-group col-6">
										<label for="banner">Heading</label>
										<input type="text" name="heading" class="form-control"
											value="<?= $brec['heading']; ?>">
									</div>

									<div class="form-group col-6">
										<label for="banner">Heading 1</label>
										<input type="text" name="heading1" class="form-control"
											value="<?= $brec['heading1']; ?>">
									</div>

								</div>

								<div class="form-group">
									<label for="banner">Subheading 1</label>
									<input type="text" name="subheading1" class="form-control"
										value="<?= $brec['subheading1']; ?>">
								</div>

								<div class="form-group">
									<label for="banner">Content</label>
									<textarea name="content" id="editor1" class="form-control"
										rows="3"><?= $brec['content']; ?></textarea>
								</div>

								<div class="row">

									<div class="col-6">
										<div class="form-group">
											<label for="exampleInputFile">Icon</label>
											<input type="file" name="icon" class="form-control" id="exampleInputFile">
											<input type="hidden" name="oldicon" value="<?= $brec['icon']; ?>">
											<p class="help-block">Icon image</p>
											<?php if ($brec['icon']) { ?>
											<img src="../uploads/members/<?= $brec['icon']; ?>"
												style="width:30%; height:100px" class="bg-dark">
											<?php } ?>
										</div>
									</div>

								</div>

								<div class="form-group">
									<label for="banner">List</label>
									<textarea name="list" id="editor2" class="form-control"
										rows="3"><?= $brec['list']; ?></textarea>
								</div>

                                    <div class="form-group">
                                        <label>Steps</label>
                                        <div id="steps-wrapper">

                                            <?php
                                            $stepHeadings = json_decode($brec['step_heading'], true);
                                            $stepContents = json_decode($brec['step_content'], true);

                                            // fallback if not valid array
                                            if (!is_array($stepHeadings)) {
                                                $stepHeadings = [];
                                            }

                                            if (!is_array($stepContents)) {
                                                $stepContents = [];
                                            }                                            

                                            if (!empty($stepHeadings)) {
                                                foreach ($stepHeadings as $key => $heading) {
                                            ?>
                                            <div class="step-item row mb-2">
                                                <div class="col-5">
                                                    <input type="text" name="step_heading[]" class="form-control"
                                                        value="<?= $heading ?>" placeholder="Step Heading">
                                                </div>

                                                <div class="col-5">
                                                    <input type="text" name="step_content[]" class="form-control"
                                                        value="<?= $stepContents[$key] ?? '' ?>" placeholder="Step Content">
                                                </div>

                                                <div class="col-2">
                                                    <button type="button" class="btn btn-danger remove-step">Remove</button>
                                                </div>
                                            </div>
                                            <?php } } ?>

                                        </div>

                                        <button type="button" id="add-step" class="btn btn-success mt-2">Add Step</button>
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

<script>
$(document).ready(function () {

    $('#add-step').click(function () {
        $('#steps-wrapper').append(`
            <div class="step-item row mb-2">
                <div class="col-5">
                    <input type="text" name="step_heading[]" class="form-control" placeholder="Step Heading">
                </div>

                <div class="col-5">
                    <input type="text" name="step_content[]" class="form-control" placeholder="Step Content">
                </div>

                <div class="col-2">
                    <button type="button" class="btn btn-danger remove-step">Remove</button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.remove-step', function () {
        $(this).closest('.step-item').remove();
    });

});
</script>

</body>

</html>