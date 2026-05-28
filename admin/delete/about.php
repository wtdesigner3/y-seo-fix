<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_about where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
@unlink("../../uploads/about/".$bannerData["image"]);

$data=mysqli_query($conn,"DELETE FROM `tbl_about` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="About Deleted successfully";
	header("location:../manage-about.php");
}
?>