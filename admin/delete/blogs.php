<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from posts where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
@unlink("../../uploads/".$bannerData["image"]); 

$data=mysqli_query($conn,"DELETE FROM `posts` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Blog Deleted successfully";
	header("location:../manage-blogs.php");
}
?>