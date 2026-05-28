<?php

require('checksession.php');

require '../inc/function.php';

if (isset($_POST['submit'])) 
{
  $category_id = mysqli_real_escape_string($conn, $_POST['category']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $producturl = mysqli_real_escape_string($conn, $_POST['url']);
  $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
  $slug = strtolower($purl);
  $alt = mysqli_real_escape_string($conn, $_POST['alt']);
  $heading = mysqli_real_escape_string($conn, $_POST['bread_heading']);
  $sort = mysqli_real_escape_string($conn, $_POST['sort']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
  $metakeyword = mysqli_real_escape_string($conn, $_POST['metakeywords']);
  $metadesc = mysqli_real_escape_string($conn, $_POST['metadescription']);
  $headtag = mysqli_real_escape_string($conn, $_POST['metatags']);
  $created_at = date('Y-m-d H:i:s');
  $updated_at = date('Y-m-d H:i:s');

  $image = $_FILES['image']['name'];
  if ($image != '') {
    $image = "subcategories/" . time() . "_" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
  }
  else {
    $image = '';
  }

  $breadimage = $_FILES['breadimage']['name'];
  if ($breadimage != '') {
    $breadimage = "subcategories/" . time() . "_" . $breadimage;
    move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
  }
  else {
    $breadimage = '';
  }

  $query = mysqli_query($conn, "INSERT INTO `sub_categories`(`category_id`,`name`,`slug`,`alt`,`bread_heading`,`sort`,`status`,`metatag`,`metakeywords`,`metadescription`,`metatags`,`image`,`breadimage`,`created_at`,`updated_at`) VALUES ('$category_id','$name','$slug','$alt','$heading','$sort','$status','$metatag','$metakeyword','$metadesc','$headtag','$image','$breadimage','$created_at','$updated_at')");
  if ($query == true) {
    $_SESSION['success'] = "inserted successfully";
    header("refresh:3;url=manage-service.php");
  }
  else {
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
				<li class="breadcrumb-item"><a href="javascript:;">Subcategory Management</a></li>
				<li class="breadcrumb-item active">Add Subcategory</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
				<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Subcategory</h1>
		
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
							<h4 class="panel-title">Add Subcategory</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                  <div class="row">

                <div class="col-md-12">
		              <div class="form-group">
                  <label for="heading">Select Category</label>
                      <select name="category" id="category" onChange="getdistrict(this.value);" class="form-control">
                          <option value="" selected>Choose One</option>
                        <?php
                    $sql2 = mysqli_query($conn, "select id,name from categories where status='1'");
                    if (mysqli_num_rows($sql2) > 0) {
                      while ($row = mysqli_fetch_assoc($sql2)) {
                    ?>
                              <option value="<?= $row['id']; ?>"><?php echo $row['name']; ?></option>

                              <?php
                        }
                      }

                      ?>
                      </select>
                  </div>
                </div>

				       <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Name</label>
                  <input type="text"  name="name" class="form-control" id="heading" placeholder="Enter Name" required>
                </div>
               </div>

				      <div class="col-lg-6">
                <div class="form-group">
                    <label for="heading">URL<code>Same as Name & avoid Special Characters</code></label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Url" required>
                </div>
              </div>

				      <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Main Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" >
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                  </div>
              </div>      
              
				       <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Alt Text</label>
                  <input type="text"  name="alt" class="form-control" placeholder="Enter Alt Text" required>
                </div>
               </div>  
               
				       <div class="col-lg-6">
                <div class="form-group">
                  <label for="heading">Breadcrumb Heading</label>
                  <input type="text"  name="bread_heading" class="form-control" placeholder="Enter Breadcrumb Heading" required>
                </div>
               </div>               

				      <div class="col-lg-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Breadcrumb Image</label>
                    <input type="file" name="breadimage" class="form-control" id="exampleInputPassword1" >
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                  </div>
              </div>    

                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sort Number</label>
                    <input type="number" name="sort" class="form-control" id="exampleInputPassword1" placeholder="1-10">
                  </div>
                </div>

				</div>	
				</div>	
           
                
                <div class="form-group row m-b-10">
					<label class="col-md-1 col-form-label">Status :-</label>
					<div class="col-md-9">
						<div class="radio radio-css radio-inline">
							<input type="radio" name="status" id="optionsRadios4" value="1" checked>
							<label for="optionsRadios4">Active</label>
						</div>
						<div class="radio radio-css radio-inline">
							<input type="radio" name="status" id="optionsRadios3" value="0">
							<label for="optionsRadios3">Inactive</label>
						</div>
					</div>
				</div>
 
				  
				<div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
          
                  <div class="form-group">
                    <label for="metatag">Meta Title</label>
                    <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" >
                  </div>  
                                 
                  <div class="form-group">
                    <label for="keyword">Meta Keyword</label>
                    <textarea name="metakeywords" id="keyword" placeholder="Meta Keyword" class="form-control" ></textarea>
                 </div> 

                 <div class="form-group">
                   <label for="metadescription">Meta Description</label>
                   <textarea name="metadescription" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                  </div> 
                  
                   <div class="form-group d-none">
                     <label for="metadescription">Head Tag Detail</label>
                     <textarea name="metatags" rows="5" id="headtag" placeholder="Meta Description" class="form-control" ></textarea>
                  </div>                  
        </div>  <br/>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
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
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php require("includes/footer.php"); ?>

<script>
$(document).ready(function() {
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
    window.onload = function() {
    var src = document.getElementById("heading"),
        dst = document.getElementById("url");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
  }

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
</script>
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
</body>
</html>
