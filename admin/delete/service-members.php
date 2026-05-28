<?php
require('../../inc/function.php');
$b = $_REQUEST['bid'];

$banner = mysqli_query($conn, "select * from sub_sub_categories where id='$b'");
$bannerData = mysqli_fetch_assoc($banner);
@unlink("../../uploads/" . $bannerData["image"]);
@unlink("../../uploads/" . $bannerData["breadimage"]);
$multiplImages = json_decode($bannerData["multi_images"], true);
foreach ($multiplImages as $image) {
    @unlink("../../uploads/" . $image);
}

$data = mysqli_query($conn, "DELETE FROM `sub_sub_categories` WHERE `id`='$b'");
if ($data == true) 
{
    $_SESSION['warning'] = "Deleted successfully";
    header("location:../manage-service-members.php");
}
?>