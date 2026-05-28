<?php
$qs=$_REQUEST['id'];
include('../../inc/function.php');
$data=mysqli_query($conn,"select * from `faq_table` where `id`='$qs'");
$rec=mysqli_fetch_array($data);
if($rec['status']==0)
{
	mysqli_query($conn,"UPDATE `faq_table` SET `status`='1' where `id`='$qs'");
}
else
{
	mysqli_query($conn,"UPDATE `faq_table` SET `status`='0' where `id`='$qs'");
}
//header("location:../view_product.php")
?>

