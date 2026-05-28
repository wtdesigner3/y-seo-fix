<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from categories where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
@unlink("../../uploads/".$bannerData["image"]); 
@unlink("../../uploads/".$bannerData["breadimage"]); 
// @unlink("../../uploads/products/".$bannerData["image3"]);
// @unlink("../../uploads/products/".$bannerData["broadimage"]);

$data=mysqli_query($conn,"DELETE FROM `categories` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Service Category Deleted successfully";
	header("location:../manage-service-category.php");
}
?>