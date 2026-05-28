<?php
require('../../inc/function.php');
$b = $_REQUEST['bid'];

$banner = mysqli_query($conn, "select * from sub_categories where id='$b'");
$bannerData = mysqli_fetch_assoc($banner);
@unlink("../../uploads/" . $bannerData["image"]);
@unlink("../../uploads/" . $bannerData["breadimage"]);

$data = mysqli_query($conn, "DELETE FROM `sub_categories` WHERE `id`='$b'");
if ($data == true) 
{
	$_SESSION['warning'] = "Product Deleted successfully";
	header("location:../manage-service.php");
}
?>