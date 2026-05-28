<?php

require('checksession.php');
include '../inc/function.php';

$b = $_REQUEST['bid'];
$bdata = mysqli_query($conn, "SELECT * FROM `sub_categories` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) 
{
  $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $producturl = mysqli_real_escape_string($conn, $_POST['url']);
  $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
  $slug = strtolower($purl);
  $alt = mysqli_real_escape_string($conn, $_POST['alt']);
  $bread_heading = mysqli_real_escape_string($conn, $_POST['bread_heading']);
  $sort = mysqli_real_escape_string($conn, $_POST['sort']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
  $metakeywords = mysqli_real_escape_string($conn, $_POST['metakeywords']);
  $metadescription = mysqli_real_escape_string($conn, $_POST['metadescription']);
  $metatags = mysqli_real_escape_string($conn, $_POST['metatags']);
  $created_at = date('Y-m-d H:i:s');
  $updated_at = date('Y-m-d H:i:s');

  $old_image = mysqli_real_escape_string($conn, $_POST['oldimage']);
  $old_brdimage = mysqli_real_escape_string($conn, $_POST['oldbrdimage']);

    $image = $_FILES['image']['name'];
    if ($image != '') {
      $image = "subcategories/" . time() . "_" . $image;
      @unlink("../uploads/" . $old_image);
      move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
    } else {
      $image = $old_image;
    }


    $breadimage = $_FILES['breadimage']['name'];
    if ($breadimage != '') {
      $breadimage = "subcategories/" . time() . "_" . $breadimage;
      @unlink("../uploads/" . $old_brdimage);
      move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
    } else {
      $breadimage = $old_brdimage;
    }

  $query = mysqli_query($conn, "UPDATE `sub_categories` SET `category_id`='$category_id',`name`='$name',`slug`='$slug',`alt`='$alt',`bread_heading`='$bread_heading',`sort`='$sort',`status`='$status',`metatag`='$metatag',`metakeywords`='$metakeywords',`metadescription`='$metadescription',`metatags`='$metatags',`image`='$image',`breadimage`='$breadimage' WHERE `id`='$b'");

  if ($query == true) {
    $_SESSION['success'] = "Updated successfully";
    header("refresh:3;url=manage-service.php");
  }
  else {
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
				<li class="breadcrumb-item"><a href="javascript:;">Sub Category Management</a></li>
				<li class="breadcrumb-item active">Edit Sub Category</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Sub Category</h1>
		
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
							<h4 class="panel-title">Edit Sub Category</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
               <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="heading">Select Category</label>
                    <select name="category_id" id="category"  class="form-control"> 
                    <option value="" selected>Select Category</option>
                      <?php
                        $sql1 = mysqli_query($conn, "SELECT id,name FROM `categories` WHERE `status`='1'");
                        if (mysqli_num_rows($sql1) > 0) {
                          while ($crec_1 = mysqli_fetch_array($sql1)) {
                        ?>
                              <option value="<?= $crec_1['id']; ?>" <?php if ($crec_1['id'] == $brec['category_id']) {
                                  echo "selected";
                                }?>><?= $crec_1['name']; ?></option>
                            <?php
                                  }
                                }?>  
                    </select>
                  </div>
                </div>

				       <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Name</label>
                  <input type="text"  name="name" class="form-control" value="<?= $brec['name']; ?>" id="heading" placeholder="Enter Name" required>
                </div>
               </div>

				      <div class="col-lg-6">
                <div class="form-group">
                    <label for="heading">URL<code>Same as Name & avoid Special Characters</code></label>
                    <input type="text" name="url" value="<?= $brec['slug']; ?>" class="form-control" id="url" placeholder="Enter Url" required>
                </div>
              </div>

				      <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Main Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" >
                    <input type="hidden" name="oldimage" value="<?= $brec['image']; ?>">
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
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
                  <label for="heading">Alt Text</label>
                  <input type="text"  name="alt" value="<?= $brec['alt']; ?>" class="form-control" placeholder="Enter Alt Text" required>
                </div>
               </div>  
               
				       <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Breadcrumb Heading</label>
                  <input type="text"  name="bread_heading" value="<?= $brec['bread_heading']; ?>" class="form-control" placeholder="Enter Breadcrumb Heading" required>
                </div>
               </div>               

				      <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Breadcrumb Image</label>
                    <input type="file" name="breadimage" class="form-control" id="exampleInputPassword1" >
                     <input type="hidden" name="oldbrdimage" value="<?= $brec['breadimage']; ?>">
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                          <?php
                          if ($brec['breadimage'] > 0) {
                            ?>
                            <img src="../uploads/<?= $brec['breadimage']; ?>" width="30%">
                            <?php
                          }
                          ?>    
                  </div>
              </div>    

                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sort Number</label>
                    <input type="number" name="sort" value="<?= $brec['sort']; ?>" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                  </div>
                </div>

              </div>              

                <div class="form-group row m-b-10">
                  <label class="col-md-1 col-form-label">Status :-</label>
                  <div class="col-md-9">
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios4" value="1" <?php if ($brec['status'] == '1') {
                          echo 'checked';
                        }?>>
                      <label for="optionsRadios4">Active</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                      <input type="radio" name="status" id="optionsRadios3" value="0" <?php if ($brec['status'] == '0') {
                          echo 'checked';
                        }?>>
                      <label for="optionsRadios3">Inactive</label>
                    </div>
                  </div>
                </div>              

                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" value="<?= $brec['metatag']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="metakeywords" id="keyword" class="form-control" ><?= $brec['metakeywords']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadescription" id="metadescription"  class="form-control" ><?= $brec['metadescription']; ?></textarea>
                 </div>
                 
                 
                  <div class="form-group d-none">
                    <label for="metadescription">Head Tag Detail</label>
                    <textarea name="metatags" rows="5" id="headtag" placeholder="Head Tag Detail" class="form-control" ><?= $brec['metatags']; ?></textarea>
                 </div> 
                 
                </div><br>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
                <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
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
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});

function defult()
{
 
    var inputValue = $('input[type="radio"]:checked').attr("value");
    if(inputValue=="Submenu")
    {
      var targetBox = $("." + inputValue);
      $(".box").not(targetBox).hide();
      $(targetBox).show();
    }
    else{
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
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

</script>

<script>
function removeRow(index) {
    var rowElement = document.getElementById('row' + index); // Get the row to be removed
    rowElement.parentNode.removeChild(rowElement); // Remove the row from the DOM
}
</script>


<script>
function remoRow(row) {
    var rowElement = row.parentNode.parentNode; // Get the row to be removed
    rowElement.parentNode.removeChild(rowElement); // Remove the row from the DOM
}
</script>


</body>
</html>
