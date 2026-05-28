<?php
require('checksession.php');
require '../inc/function.php';

if (isset($_POST['submit'])) {

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

    $breadimage = $_FILES['breadimage']['name'];
    if ($breadimage != '') {
        $breadimage = "categories/" . time() . "_" . $breadimage;
        move_uploaded_file($_FILES["breadimage"]["tmp_name"], "../uploads/" . $breadimage);
    } else {
        $breadimage = '';
    }

    $image = $_FILES['image']['name'];
    if ($image != '') {
        $image = "categories/" . time() . "_" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $image);
    } else {
        $image = '';
    }

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $query = mysqli_query($conn, "INSERT INTO `categories`(`name`, `slug`, `image`, `alt`,`breadimage`, `bread_heading`,`desc_heading`, `content_heading`, `description`, `sort`, `status`, `created_at`,`updated_at`,`metatag`,`metadescription`,`metakeywords`,`metatags`,`long_desc`) VALUES ('$name','$slug','$image','$alt','$breadimage','$bread_heading','$desc_heading','$content_heading','$description','$sort','$status','$created_at','$updated_at','$metatag','$metadescription','$metakeywords','$metatags','$long_desc')");
    if ($query == true) {
        $_SESSION['success'] = "Category inserted successfully";
        header("refresh:3;url=manage-service-category.php");
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
    <!-- end #header -->
    <!-- begin #sidebar -->
    <?php require("includes/left.php"); ?>

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Category Management</a></li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
                class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
                    class="fa fa-arrow-left"></i></a> Manage Category  </h1>

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
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Add Category</h4>
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
                                            <input type="text" name="name" class="form-control" id="heading"
                                                placeholder="Enter Category Name" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Category
                                                URL<code>Same as Category name & avoid Special Characters</code></label>
                                            <input type="text" name="url" class="form-control" id="url"
                                                placeholder="Enter Category Url" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Main Image</label>
                                            <input type="file" name="image" class="form-control"
                                                id="exampleInputFile">
                                            <p class="help-block">Image dimension must be 1920 X 336 & must be webp
                                                format</p>
                                        </div>
                                    </div>    
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Image Alt</label>
                                            <input type="text" name="alt" class="form-control"
                                                placeholder="Enter Image Alt" required>
                                        </div>
                                    </div>      
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Breadcrumb Image</label>
                                            <input type="file" name="breadimage" class="form-control"
                                                id="exampleInputFile">
                                            <p class="help-block">Image dimension must be 1920 X 336 & must be webp
                                                format</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Breadcrumb Heading</label>
                                            <input type="text" name="bread_heading" class="form-control"
                                                placeholder="Enter Breadcrumb Heading" required>
                                        </div>
                                    </div>                                         
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Content Heading</label>
                                            <input type="text" name="content_heading" class="form-control"
                                                placeholder="Enter Content Heading" required>
                                        </div>
                                    </div>                                         
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Description Heading</label>
                                            <input type="text" name="desc_heading" class="form-control"
                                                placeholder="Enter Description Heading" required>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="heading">Category Description</label>
                                            <textarea name="description" class="form-control" id="editor1"
                                                placeholder="Enter Category Description" required></textarea>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="heading">Long Description</label>
                                            <textarea name="long_desc" class="form-control" id="editor2"
                                                placeholder="Enter Long Description" required></textarea>
                                        </div>
                                    </div>                                    

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sort Number</label>
                                            <input type="number" name="sort" class="form-control"
                                                id="exampleInputPassword1" placeholder="1-10">
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

                                <div id="dvPassport"
                                    style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;">
                                    <div class="form-group">
                                        <label for="metatag">Meta Title</label>
                                        <input type="text" name="metatag" id="metatag" placeholder="Meta Title"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="keyword">Meta Keyword</label>
                                        <textarea name="metakeywords" id="keyword" placeholder="Meta Keyword"
                                            class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="metadescription">Meta Description</label>
                                        <textarea name="metadescription" id="metadescription"
                                            placeholder="Meta Description" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="metadescription">Extra Meta Tags</label>
                                        <textarea name="metatags" id="metatags" placeholder="Extra Meta Tags"
                                            class="form-control"></textarea>
                                    </div>
                                </div> <br />

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Click Here To
                                    Submit</button>
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
        window.onload = function () {
            var src = document.getElementById("heading"),
                dst = document.getElementById("url");
            src.addEventListener('input', function () {
                dst.value = src.value;
            });
        }

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

    <script>
        // Select the container where fields will be added
        const container = document.getElementById('dynamic-fields');

        container.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('add-btn')) {
                // Create new input group
                const newField = document.createElement('div');
                newField.classList.add('input-group', 'mb-2');

                newField.innerHTML = `
                <input type="text" name="chapter_names[]" class="form-control" placeholder="Enter Region Name" required>
                <button class="btn btn-danger remove-btn" type="button">Remove</button>
            `;
                container.appendChild(newField);
            }

            // Handle remove button click
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
</body>

</html>