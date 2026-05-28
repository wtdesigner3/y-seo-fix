<?php
require('checksession.php');
require('../inc/function.php');
// require("includes/image_compressure.php");

$b = $_REQUEST['bid'];
$bdata = mysqli_query($conn, "SELECT * FROM `posts` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$bread_heading = mysqli_real_escape_string($conn, $_POST['bread_heading']);
	$prourls = mysqli_real_escape_string($conn, $_POST['prourl']);
	$prourrl = str_replace(array('\'', '"', ' ', ',', ';', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '(', ')', '.', '?', '{', '}', '[', ']', '|', '~', '`', ':'), '-', $prourls);
	$slug = strtolower($prourrl);
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$alt = mysqli_real_escape_string($conn, $_POST['alt']);
	$metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
	$metadescription = mysqli_real_escape_string($conn, $_POST['metadescription']);
	$metakeywords = mysqli_real_escape_string($conn, $_POST['metakeywords']);
	$head_tags = mysqli_real_escape_string($conn, $_POST['head_tags']);
	$sort_order = mysqli_real_escape_string($conn, $_POST['sort_order']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
  $old = mysqli_real_escape_string($conn, $_POST['oldimg']);

	$updated_at = date('Y-m-d H:i:s');

  $image = $_FILES['image']['name'];
  if ($image != '') {
    $image = time() . "_" . $image;
    @unlink("../uploads/" . $old);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
  } else {
    $image = $old;
  }

  $query = mysqli_query($conn, "UPDATE `posts` SET `image`='$image', `title`='$title', `bread_heading`='$bread_heading', `slug`='$slug', `content`='$content', `alt`='$alt', `metatag`='$metatag', `metadescription`='$metadescription', `metakeywords`='$metakeywords', `head_tags`='$head_tags', `sort_order`='$sort_order', `status`='$status', `updated_at`='$updated_at' WHERE `id`='$b'");
  if ($query == true) {
    $_SESSION['success'] = "Blog Updated Successfully";
    header("refresh:3;url=manage-blogs.php");
  } else {
    $_SESSION['error'] = "Something went wrong. Please try again";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- begin #page-container -->
  <div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
    <!-- begin #page-container -->
    <?php require("includes/header.php"); ?>
    <!-- begin #sidebar -->
    <?php require("includes/left.php"); ?>
    <!-- begin #content -->
    <div id="content" class="content">
      <!-- begin breadcrumb -->
      <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li class="breadcrumb-item active">Edit Blogs</li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
          class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
            class="fa fa-arrow-left"></i></a> Manage Blogs </h1>
      <!-- begin row -->
      <div class="row">
        <!-- begin col-10 -->
        <div class="col-lg-12">
          <!-- begin panel -->
          <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
              <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                    class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title"> Edit Blogs</h4>
            </div>
            <!-- begin panel-body -->
            <div class="panel-body">
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="bannerlink"> Blogs Title</label>
                        <input type="text" name="title" class="form-control" id="name" value="<?= $brec['title']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="heading">Blogs URL<code>Same as Blogs name & avoid Special Characters</code></label>
                        <input type="text" name="prourl" class="form-control" id="url" placeholder="Enter Blogs Url"
                          value="<?= $brec['slug']; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="image" class="form-control">
                      <input type="hidden" name="oldimg" value="<?= $brec['image']; ?>">
                      <p class="help-block">Image dimension must be 1366 × 767 px & must be jpg format</p>
                      <img src="../uploads/<?= $brec['image']; ?>" style="width:20%;">
                    </div>
                  </div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="title">Image Alt</label>
											<input type="text" name="alt" class="form-control"
												placeholder="Enter Image Alt" value="<?= $brec['alt']; ?>">
										</div>
									</div>										

									<div class="col-md-12">
										<div class="form-group">
											<label for="title">Breadcrumb Heading</label>
											<input type="text" name="bread_heading" class="form-control" 
												placeholder="Enter Breadcrumb Heading" value="<?= $brec['bread_heading']; ?>">
										</div>
									</div>
                  </div>

                  <div class="form-group">
                    <label for="bannerlink">Blogs Description</label>
                    <textarea name="content" placeholder="Enter  Description" class="form-control"
                      id="editor1"><?= $brec['content'] ?></textarea>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Blog Position</label>
                        <input type="text" name="sort_order" class="form-control" value="<?= $brec['sort_order']; ?>">
                      </div>
                    </div>

                  </div>

									<div id="myDIV" style="display:none;border: 1px solid #000; padding: 9px;">
										<div class="form-group">
											<label for="metatag">Meta Title</label>
											<input type="text" name="metatag" value="<?= $brec['metatag']; ?>" id="metatag" placeholder="Meta Title"
												class="form-control">
										</div>

										<div class="form-group">
											<label for="keyword">Meta Keyword</label>
											<textarea name="metakeywords" id="keyword" placeholder="Meta Keyword"
												class="form-control"><?= $brec['metakeywords']; ?></textarea>
										</div>

										<div class="form-group">
											<label for="metadescription">Meta Description</label>
											<textarea name="metadescription" id="metadescription"
												placeholder="Meta Description" class="form-control"><?= $brec['metadescription']; ?></textarea>
										</div>

										<div class="form-group d-none">
											<label for="metadescription">Head Tag Detail</label>
											<textarea name="head_tags" id="headtag" placeholder="Meta Description"
												class="form-control"><?= $brec['head_tags']; ?></textarea>
										</div>
									</div><br>


                  <div class="form-group">
                    <input type="radio" value="1" id="optionsRadios3" name="status" <?php if ($brec['status'] == '1') {
                      echo 'checked';
                    } ?>>
                    <label for="optionsRadios3">Active</label>

                    <input type="radio" value="0" id="optionsRadios4" name="status" <?php if ($brec['status'] == '0') {
                      echo 'checked';
                    } ?>>
                    <label for="optionsRadios4">Inactive</label>
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="update" class="btn btn-primary">Click To Update Data</button>
                  <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                  <button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button>
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
      CKEDITOR.replace('editor3', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
      });
    });
  </script>
  <script>
    window.onload = function () {
      var src = document.getElementById("name"),
        dst = document.getElementById("url");
      src.addEventListener('input', function () {
        dst.value = src.value;
      });
    }

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