<?php

require('checksession.php');
require '../inc/function.php';

if (isset($_POST['submit'])) 
{
    $subcategory_id = mysqli_real_escape_string($conn, $_POST['subcategory_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $producturl = mysqli_real_escape_string($conn, $_POST['url']);
    $purl = str_replace(array('\'', '"', ' ', ',', ';', '.', '!', '@', '(', ')', '(', '#', '^', '*', ',', '/', '&', '_', '$', '--', '-', '<', '>', '%', '=', ':', '?', '[', ']', '~', '+', '`', '{', '}', '|'), '-', $producturl);
    $slug = strtolower($purl);
    $bread_heading = mysqli_real_escape_string($conn, $_POST['bread_heading']);
    $bread_subheading = mysqli_real_escape_string($conn, $_POST['bread_subheading']);
    $alt = mysqli_real_escape_string($conn, $_POST['alt']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $long_desc = mysqli_real_escape_string($conn, $_POST['long_desc']);
    $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
    $metadescription = mysqli_real_escape_string($conn, $_POST['metadescription']);
    $metakeywords = mysqli_real_escape_string($conn, $_POST['metakeywords']);
    $metatags = mysqli_real_escape_string($conn, $_POST['metatags']);
    $sort = mysqli_real_escape_string($conn, $_POST['sort']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $image = $_FILES['image']['name'];
    if ($image != '') {
        $image = "subsubcategories/" . time() . "_" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
    }
    else {
        $image = '';
    }

    $breadimage = $_FILES['breadimage']['name'];
    if ($breadimage != '') {
        $breadimage = "subsubcategories/" . time() . "_" . $breadimage;
        move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
    }
    else {
        $breadimage = '';
    }
    
    $uploaded_images = [];

    if (!empty($_FILES['multiple_images']['name'][0])) {

        foreach ($_FILES['multiple_images']['name'] as $key => $image_name) {

            $tmp_name = $_FILES['multiple_images']['tmp_name'][$key];

            // Generate unique file name
            $new_name = "subsubcategories/" . time() . "_" . rand(1000,9999) . ".png";

            // Move file
            if (move_uploaded_file($tmp_name, "../uploads/" . $new_name)) {
                $uploaded_images[] = $new_name;
            }
        }
    }

    // Convert array to JSON for DB storage
    $multi_images = json_encode($uploaded_images);

    $query = mysqli_query($conn, "INSERT INTO `sub_sub_categories`(`name`,`bread_heading`,`bread_subheading`,`subcategory_id`,`slug`,`image`,`alt`,`breadimage`,`multi_images`,`description`,`sort`,`status`,`created_at`,`updated_at`,`metatag`,`metadescription`,`metakeywords`,`metatags`,`long_desc`) VALUES ('$name','$bread_heading','$bread_subheading','$subcategory_id','$slug','$image','$alt','$breadimage','$multi_images','$description','$sort','$status','$created_at','$updated_at','$metatag','$metadescription','$metakeywords','$metatags','$long_desc')");
    if ($query == true) {
        $_SESSION['success'] = "inserted successfully";
        header("refresh:3;url=manage-service-members.php");
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
				<li class="breadcrumb-item"><a href="javascript:;">Product Management</a></li>
				<li class="breadcrumb-item active">Add Product</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
				<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Product</h1>
		
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
							<h4 class="panel-title">Add Product</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                  <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Sub Category</label>
                                <select name="subcategory_id" class="form-control"> 
                                    <option value="">Select Category</option>
                                    <?php
                                        $sql = mysqli_query($conn, "SELECT id, name FROM sub_categories WHERE status='1'");
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                        ?>
                                        <option value="<?= $row['id']; ?>">
                                            <?= $row['name']; ?>
                                        </option>
                                    <?php
                                            }?>
                                </select>
                            </div>
                        </div>

                        <br>

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
                                <label for="breadcrumb_heading">Breadcrumb Heading</label>
                                <input type="text"  name="bread_heading" class="form-control" placeholder="Enter Breadcrumb Heading" required>
                            </div>
                        </div>

				       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="breadcrumb_subheading">Breadcrumb Sub Heading</label>
                                <input type="text"  name="bread_subheading" class="form-control" placeholder="Enter Breadcrumb Sub Heading" required>
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
                                <label for="image_alt">Image Alt</label>
                                <input type="text"  name="alt" class="form-control" placeholder="Enter Image Alt" required>
                            </div>
                        </div>     
                        
				        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="breadcrumb_image">Breadcrumb Image</label>
                                <input type="file" name="breadimage" class="form-control" >
                                <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                            </div>
                        </div>   

                        <!-- here for multiple images -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="multiple_images">Multiple Images</label>
                        <input type="file" name="multiple_images[]" class="form-control" multiple>
                        <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                    </div>
                </div>
                        
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description" required></textarea>
                  </div>
                </div>                        
                        
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Long Description</label>
                    <textarea name="long_desc" class="form-control" id="editor2" placeholder="Enter Long Description"></textarea>
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

<!-- AJAX Script -->
<script>
$(document).ready(function(){

    $('#chapter_id').on('change', function(){
        var chapter_id = $(this).val();

        if(chapter_id != ''){
            $.ajax({
                url: "get_services.php",
                type: "POST",
                data: {chapter_id: chapter_id},
                success: function(response){
                    $('#chapter_detail_id').html(response);
                }
            });
        } else {
            $('#chapter_detail_id').html('<option value="">Select Chapter</option>');
        }
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
