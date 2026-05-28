<?php
require('checksession.php');
include '../inc/function.php';

$b = $_REQUEST['bid'];
$bdata = mysqli_query($conn, "SELECT * FROM `categories` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $producturl = mysqli_real_escape_string($conn, $_POST['url']);
    $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
    $slug = strtolower($purl);
    $alt = mysqli_real_escape_string($conn, $_POST['alt']);
    $bread_heading = mysqli_real_escape_string($conn, $_POST['bread_heading']);
    $desc_heading = mysqli_real_escape_string($conn, $_POST['desc_heading']);
    $content_heading = mysqli_real_escape_string($conn, $_POST['content_heading']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $long_desc = mysqli_real_escape_string($conn, $_POST['long_desc']);
    $sort = mysqli_real_escape_string($conn, $_POST['sort']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
    $metadescription = mysqli_real_escape_string($conn, $_POST['metadescription']);
    $metakeywords = mysqli_real_escape_string($conn, $_POST['metakeywords']);
    $metatags = mysqli_real_escape_string($conn, $_POST['metatags']);
    $oldimage = mysqli_real_escape_string($conn, $_POST['oldimage']);
    $oldbreadimage = mysqli_real_escape_string($conn, $_POST['oldbreadimage']);

    $breadimage = $_FILES['breadimage']['name'];
    if ($breadimage != '') {
      $breadimage = "categories/" .time() . "_" . $breadimage;
      @unlink("../uploads/" . $oldbreadimage);
      move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
    } else {
      $breadimage = $oldbreadimage;
    }

    $image = $_FILES['image']['name'];
    if ($image != '') {
      $image = "categories/" . time() . "_" . $image;
      @unlink("../uploads/" . $oldimage);
      move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
    } else {
      $image = $oldimage;
    }

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

  $query = mysqli_query($conn, "UPDATE `categories` SET `name`='$name',`slug`='$slug',`alt`='$alt',`breadimage`='$breadimage',`image`='$image',`bread_heading`='$bread_heading',`desc_heading`='$desc_heading', `content_heading`='$content_heading', `description`='$description', `metatag`='$metatag', `metadescription`='$metadescription', `metakeywords`='$metakeywords', `metatags`='$metatags', `sort`='$sort', `status`='$status', `created_at`='$created_at', `updated_at`='$updated_at', `long_desc`='$long_desc' WHERE `id`='$b'");

  if ($query == true) {
    $_SESSION['success'] = "Category updated successfully";
    header("refresh:3;url=manage-service-category.php");
  } else {
    // Message for unsuccessfull insertion
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
  <!-- end #header -->
  <!-- begin #sidebar -->
  <?php require("includes/left.php"); ?>

  <!-- begin #content -->
  <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
      <li class="breadcrumb-item"><a href="javascript:;">Category Management</a></li>
      <li class="breadcrumb-item active">Edit Category </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
        class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a>
      Manage Category </h1>

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
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                  class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                  class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                  class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                  class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Edit Category</h4>
          </div>
          <!-- end panel-heading -->

          <!-- begin panel-body -->
          <div class="panel-body">
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Category Name</label>
                            <input type="text" name="name" value="<?php echo $brec['name']; ?>" class="form-control" id="heading"
                                placeholder="Enter Category Name" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Category
                                URL<code>Same as Category name & avoid Special Characters</code></label>
                            <input type="text" name="url" value="<?php echo $brec['slug']; ?>" class="form-control" id="url"
                                placeholder="Enter Category Url" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Main Image</label>
                            <input type="file" name="image"  class="form-control" id="exampleInputFile">
                            <input type="hidden" name="oldimage" value="<?= $brec['image']; ?>">
                            <p class="help-block">Image dimension must be 1920 X 336 & must be webp
                                format</p>
                          <?php
                          if ($brec['image'] > 0) {
                            ?>
                            <img src="../uploads/<?= $brec['image']; ?>" width="30%">
                            <?php
                          }
                          ?>                                
                        </div>
                    </div>    
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Image Alt</label>
                            <input type="text" name="alt" value="<?php echo $brec['alt']; ?>" class="form-control"
                                placeholder="Enter Image Alt" required>
                        </div>
                    </div>      
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Breadcrumb Image</label>
                            <input type="file" name="breadimage" class="form-control"
                                id="exampleInputFile">
                            <input type="hidden" name="oldbreadimage" value="<?= $brec['breadimage']; ?>">
                            <p class="help-block">Image dimension must be 1920 X 336 & must be webp
                                format</p>
                            <?php
                            if ($brec['breadimage'] > 0) {
                                ?>
                                <img src="../uploads/<?= $brec['breadimage']; ?>" width="30%">
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Breadcrumb Heading</label>
                            <input type="text" name="bread_heading" value="<?php echo $brec['bread_heading']; ?>" class="form-control"
                                placeholder="Enter Breadcrumb Heading" required>
                        </div>
                    </div>                                         
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Content Heading</label>
                            <input type="text" name="content_heading" value="<?php echo $brec['content_heading']; ?>" class="form-control"
                                placeholder="Enter Content Heading" required>
                        </div>
                    </div>                                         
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="heading">Description Heading</label>
                            <input type="text" name="desc_heading" value="<?php echo $brec['desc_heading']; ?>" class="form-control"
                                placeholder="Enter Description Heading" required>
                        </div>
                    </div>   
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="heading">Category Description</label>
                            <textarea name="description" class="form-control" id="editor1"
                                placeholder="Enter Category Description" required><?php echo $brec['description']; ?></textarea>
                        </div>
                    </div>                                    
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="heading">Long Description</label>
                            <textarea name="long_desc" class="form-control" id="editor2"
                                placeholder="Enter Long Description" required><?php echo $brec['long_desc']; ?></textarea>
                        </div>
                    </div>                                    

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sort Number</label>
                            <input type="number" name="sort" value="<?php echo $brec['sort']; ?>" class="form-control"
                                id="exampleInputPassword1" placeholder="1-10">
                        </div>
                    </div>

                </div>

                <div class="form-group row m-b-10">
                    <label class="col-md-1 col-form-label">Status :-</label>
                    <div class="col-md-9">
                        <div class="radio radio-css radio-inline">
                            <input type="radio" name="status" id="optionsRadios4" value="1" <?php echo $brec['status'] == 1 ? 'checked' : ''; ?>>
                            <label for="optionsRadios4">Active</label>
                        </div>
                        <div class="radio radio-css radio-inline">
                            <input type="radio" name="status" id="optionsRadios3" value="0" <?php echo $brec['status'] == 0 ? 'checked' : ''; ?>>
                            <label for="optionsRadios3">Inactive</label>
                        </div>
                    </div>
                </div>

                <div id="dvPassport"
                    style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;">
                    <div class="form-group">
                        <label for="metatag">Meta Title</label>
                        <input type="text" name="metatag" id="metatag" placeholder="Meta Title"
                            class="form-control" value="<?php echo $brec['metatag']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="keyword">Meta Keyword</label>
                        <textarea name="metakeywords" id="keyword" placeholder="Meta Keyword"
                            class="form-control"><?php echo $brec['metakeywords']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="metadescription">Meta Description</label>
                        <textarea name="metadescription" id="metadescription"
                            placeholder="Meta Description" class="form-control"><?php echo $brec['metadescription']; ?></textarea>
                    </div>

                    <div class="form-group d-none">
                        <label for="metadescription">Extra Meta Tags</label>
                        <textarea name="metatags" id="metatags" placeholder="Extra Meta Tags"
                            class="form-control"><?php echo $brec['metatags']; ?></textarea>
                    </div>
                </div> <br />

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
                <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools"
                  name="btnPassport" />
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
      defult();
      CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
      });
      CKEDITOR.replace('editor2', {
        filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
      });
    });
  </script>
  <!------------------>
  <script>
    $(document).ready(function () {
      $('input[type="radio"]').click(function () {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
      });
    });

    function defult() {

      var inputValue = $('input[type="radio"]:checked').attr("value");
      if (inputValue == "Submenu") {
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
      }
      else {
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
      }


    }

  </script>
  <!----Seo tool----->
  <!----Seo tool----->
  <script type="text/javascript">
    $(function () {
      $("#btnPassport").click(function () {
        if ($(this).val() == "Use Seo tools") {
          $("#dvPassport").show();
          $(this).val("Close Seo tools");
        } else {
          $("#dvPassport").hide();
          $(this).val("Use Seo tools");
        }
      });
    });
  </script>
  <!----Get Image----->

  <script>
    const container = document.getElementById('dynamic-fields');

    container.addEventListener('click', function (e) {
      if (e.target && e.target.classList.contains('add-btn')) {
        const newField = document.createElement('div');
        newField.classList.add('input-group', 'mb-2');

        newField.innerHTML = `
                <input type="text" name="chapter_names[]" class="form-control" placeholder="Enter Chapter Name" required>
                <button class="btn btn-danger remove-btn" type="button">Remove</button>
            `;
        container.appendChild(newField);
      }

      if (e.target && e.target.classList.contains('remove-btn')) {
        e.target.parentElement.remove();
      }
    });
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
  <!----End Get Image----->
  <script>
    window.onload = function () {
      var src = document.getElementById("heading"),
        dst = document.getElementById("url");
      src.addEventListener('input', function () {
        dst.value = src.value;
      });
    }

  </script>

</body>

</html>