<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from projects where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
$images = explode(',', $bannerData["image"]);
foreach($images as $image) {
    @unlink("../../uploads/".$image); 
}


$data=mysqli_query($conn,"DELETE FROM `projects` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Deleted successfully";
	header("location:../manage-testimonial.php");
}
?>