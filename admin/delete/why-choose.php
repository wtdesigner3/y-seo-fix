<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from why_choose where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);



$data=mysqli_query($conn,"DELETE FROM `why_choose` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Deleted successfully";
	header("location:../manage-why-choose.php");
}
?>