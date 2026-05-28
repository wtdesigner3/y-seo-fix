<?php
require('checksession.php');
include '../inc/function.php';

$b = $_REQUEST['bid'];
$bdata = mysqli_query($conn, "SELECT * FROM `sub_sub_categories` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) 
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
    $oldimage = mysqli_real_escape_string($conn, $_POST['oldimage']);
    $oldbreadimage = mysqli_real_escape_string($conn, $_POST['oldbreadimage']);
    $updated_at = date('Y-m-d H:i:s');

    $image = $_FILES['image']['name'];
    if ($image != '') {
        $image = time() . "_" . $image;
        @unlink("../uploads/" . $oldimage);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
    }
    else {
        $image = $oldimage;
    }

    $breadimage = $_FILES['breadimage']['name'];
    if ($breadimage != '') {
        $breadimage = time() . "_" . $breadimage;
        @unlink("../uploads/" . $oldbreadimage);
        move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
    }
    else {
        $breadimage = $oldbreadimage;
    }

        // OLD IMAGES FROM DB
    $old_images = json_decode($brec['multi_images'], true);

    if (!is_array($old_images)) {
        $old_images = [];
    }

    /*
    ==========================
    REMOVE SELECTED IMAGES
    ==========================
    */

    if (!empty($_POST['remove_images'])) {

        foreach ($_POST['remove_images'] as $remove_img) {

            // REMOVE FROM FOLDER
            $file_path = "../uploads/" . $remove_img;

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // REMOVE FROM ARRAY
            $key = array_search($remove_img, $old_images);

            if ($key !== false) {
                unset($old_images[$key]);
            }
        }
    }

    /*
    ==========================
    UPLOAD NEW IMAGES
    ==========================
    */

    $new_uploaded_images = [];

    if (!empty($_FILES['multiple_images']['name'][0])) {

        foreach ($_FILES['multiple_images']['name'] as $key => $image_name) {

            $tmp_name = $_FILES['multiple_images']['tmp_name'][$key];

            $extension = pathinfo($image_name, PATHINFO_EXTENSION);

            // UNIQUE FILE NAME
            $new_name = "subsubcategories/" . uniqid() . "." . $extension;

            // MOVE FILE
            if (move_uploaded_file($tmp_name, "../uploads/" . $new_name)) {

                $new_uploaded_images[] = $new_name;
            }
        }
    }

    /*
    ==========================
    MERGE OLD + NEW IMAGES
    ==========================
    */

    $final_images = array_merge($old_images, $new_uploaded_images);

    // REINDEX ARRAY
    $final_images = array_values($final_images);

    // CONVERT TO JSON
    $multi_images = json_encode($final_images);


    $query = mysqli_query($conn, "UPDATE `sub_sub_categories` SET `name`='$name',`image`='$image',`breadimage`='$breadimage',`alt`='$alt',`bread_heading`='$bread_heading',`bread_subheading`='$bread_subheading',`description`='$description',`metatag`='$metatag',`metadescription`='$metadescription',`metakeywords`='$metakeywords',`metatags`='$metatags',`sort`='$sort',`status`='$status',`updated_at`='$updated_at',`multi_images`='$multi_images',`subcategory_id`='$subcategory_id',`long_desc`='$long_desc' WHERE `id`='$b'");

    if ($query == true) {
        $_SESSION['success'] = "Updated successfully";
        header("refresh:3;url=manage-service-members.php");
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
				<li class="breadcrumb-item"><a href="javascript:;">Chapter Details Management</a></li>
				<li class="breadcrumb-item active">Edit Chapter Details</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Chapter Details</h1>
		
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
							<h4 class="panel-title">Edit Chapter Details</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
               <div class="row">

                <!-- CATEGORY -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Sub Category</label>
                                <select name="subcategory_id" class="form-control"> 
                                    <option value="">Select Category</option>
                                    <?php
                                        $sql = mysqli_query($conn, "SELECT id, name FROM sub_categories WHERE status='1'");
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                        ?>
                                        <option value="<?= $row['id']; ?>" <?= ($row['id'] == $brec['subcategory_id']) ? 'selected' : ''; ?>>
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
                                <input type="text"  name="name" value="<?= $brec['name']; ?>" class="form-control" id="heading" placeholder="Enter Name" required>
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
                                <label for="breadcrumb_heading">Breadcrumb Heading</label>
                                <input type="text"  name="bread_heading" value="<?= $brec['bread_heading']; ?>" class="form-control" placeholder="Enter Breadcrumb Heading" required>
                            </div>
                        </div>

				       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="breadcrumb_subheading">Breadcrumb Sub Heading</label>
                                <input type="text"  name="bread_subheading" value="<?= $brec['bread_subheading']; ?>" class="form-control" placeholder="Enter Breadcrumb Sub Heading" required>
                            </div>
                        </div>                        

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="bannerlink"> Main Image</label>
                    <input type="file"  name="image"  class="form-control" id="bannerlink">
                    <input type="hidden" name="oldimage"  value="<?= $brec['image']; ?>">
                    <img src="../uploads/<?= $brec['image']; ?>" width="30%" >
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                  </div>
                </div>     
                
                      <div class="col-lg-6">
                            <div class="form-group">
                                <label for="image_alt">Image Alt</label>
                                <input type="text"  name="alt" value="<?= $brec['alt']; ?>" class="form-control" placeholder="Enter Image Alt" required>
                            </div>
                        </div>      
                        
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="bannerlink"> Breadcrumb Image</label>
                    <input type="file"  name="breadimage"  class="form-control" id="bannerlink">
                    <input type="hidden" name="oldbreadimage"  value="<?= $brec['breadimage']; ?>">
                    <img src="../uploads/<?= $brec['breadimage']; ?>" width="30%" >
                    <p class="help-block">Image dimension must be 668 X 645 px & must be jpg format</p>
                  </div>
                </div>  

                <?php
                $old_images = json_decode($brec['multi_images'], true);
                ?>

                <div class="row">
                    <?php
                    if (!empty($old_images)) {
                        foreach ($old_images as $key => $img) {
                    ?>
                    <div class="col-md-3 text-center" style="margin-bottom:20px;">
                        <img src="../uploads/<?php echo $img; ?>" 
                            width="120" 
                            height="120"
                            style="border:1px solid #ccc; padding:5px;">
                        <br><br>
                        <label>
                            <input type="checkbox" name="remove_images[]" value="<?php echo $img; ?>">
                            Remove
                        </label>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- NEW IMAGES -->
                <div class="form-group">
                    <label>Add More Images</label>
                    <input type="file" name="multiple_images[]" class="form-control" multiple>

                    <p style="color:red;">
                        Image dimension must be 668 X 645 px & must be jpg/png
                    </p>
                </div>
                
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description" required><?= $brec['description']; ?></textarea>
                  </div>
                </div>                  
                
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Long Description</label>
                    <textarea name="long_desc" class="form-control" id="editor2" placeholder="Enter Description" required><?= $brec['long_desc']; ?></textarea>
                  </div>
                </div>                  

                <div class="col-lg-12">
                	<div class="form-group">
                    <label for="exampleInputPassword1">Sort Number</label>
                    <input type="number" name="sort" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                  </div>
                </div>

              </div>  
              
                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                  
                          <div class="form-group">
                            <label for="metatag">Meta Title</label>
                            <input type="text" name="metatag" id="metatag" value="<?= $brec['metatag']; ?>" placeholder="Meta Title" class="form-control" >
                          </div>  
                                        
                          <div class="form-group">
                            <label for="keyword">Meta Keyword</label>
                            <textarea name="metakeywords" id="keyword" value="<?= $brec['metakeywords']; ?>" placeholder="Meta Keyword" class="form-control" ><?= $brec['metakeywords']; ?></textarea>
                        </div> 

                        <div class="form-group">
                          <label for="metadescription">Meta Description</label>
                          <textarea name="metadescription" id="metadescription" value="<?= $brec['metadescription']; ?>" placeholder="Meta Description" class="form-control" ><?= $brec['metadescription']; ?></textarea>
                          </div> 
                          
                          <div class="form-group d-none">
                            <label for="metadescription">Head Tag Detail</label>
                            <textarea name="metatags" rows="5" id="headtag" value="<?= $brec['metatags']; ?>" placeholder="Meta Description" class="form-control" ><?= $brec['metatags']; ?></textarea>
                          </div>                  
                </div>  <br/>                 

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

<!-- AJAX SCRIPT -->
<script>
$(document).ready(function(){

    var selectedChapter = "<?= $selected_chapter_id ?>";
    var selectedDetail  = "<?= $selected_detail_id ?>";

    function loadDetails(chapter_id, selectedDetail = ''){
        if(chapter_id != ''){
            $.ajax({
                url: "get_services.php",
                type: "POST",
                data: {chapter_id: chapter_id},
                success: function(response){
                    $('#chapter_detail_id').html(response);

                    if(selectedDetail != ''){
                        $('#chapter_detail_id').val(selectedDetail);
                    }
                }
            });
        } else {
            $('#chapter_detail_id').html('<option value="">Select Chapter</option>');
        }
    }

    loadDetails(selectedChapter, selectedDetail);

    $('#chapter_id').on('change', function(){
        var chapter_id = $(this).val();
        loadDetails(chapter_id);
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
