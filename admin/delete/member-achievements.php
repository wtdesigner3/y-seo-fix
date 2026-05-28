<?php
require('../../inc/function.php');
$b=$_REQUEST['bid'];

$banner=mysqli_query($conn,"select * from tbl_member_ach where id='$b'");
$bannerData=mysqli_fetch_assoc($banner);
@unlink("../../uploads/members/".$bannerData["icon"]); 

$data=mysqli_query($conn,"DELETE FROM `tbl_member_ach` WHERE `id`='$b'");
if($data==true)
{
	$_SESSION['warning']="Record Deleted successfully";
	header("location:../manage-member-achievements.php");
}
?>