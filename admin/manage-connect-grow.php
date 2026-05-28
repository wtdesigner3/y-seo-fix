<?php
require('checksession.php');
require('../inc/function.php');

$bdata = mysqli_query($conn, "SELECT * FROM `tbl_connect_grow`");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $oldimage1 = mysqli_real_escape_string($conn, $_POST['oldimage1']);

    $image1 = $_FILES['image1']['name'];
    if ($image1 != "") {
        $image1 = time() . "_" . $image1;
        @unlink("../uploads/extra/" . $oldimage1);
        move_uploaded_file($_FILES["image1"]["tmp_name"], "../uploads/extra/" . $image1);
    } else {
        $image1 = $brec['image'];
    }

    $query = mysqli_query($conn, "UPDATE `tbl_connect_grow` SET `image`='$image1',`title`='$title' WHERE `id` = '1'");
    if ($query == true) {
        $_SESSION['success'] = "Updated Successfully";
        header("refresh:3;url=manage-connect-grow.php");
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
            <li class="breadcrumb-item"><a href="javascript:;">Connect & Grow Management</a></li>
            <li class="breadcrumb-item active">Edit Connect & Grow</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
                class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
                    class="fa fa-arrow-left"></i></a> Manage Connect & Grow</h1>
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
                        <h4 class="panel-title"> Edit Connect & Grow</h4>
                    </div>
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="banner">Enter Heading</label>
                                        <input type="text" name="title" class="form-control"
                                            value="<?= $brec['title']; ?>">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFile">Image 1</label>
                                        <input type="file" name="image1" class="form-control" id="exampleInputFile">
                                        <input type="hidden" name="oldimage1" value="<?= $brec['image']; ?>">
                                        <p class="help-block">Image dimension must be 570 × 569 px & must be jpg
                                            format</p>
                                        <img src="../uploads/extra/<?= $brec['image']; ?>"
                                            style="width:30%; height:100px" class="bg-dark">
                                    </div>

                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
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