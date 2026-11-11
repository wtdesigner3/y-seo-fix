<?php
session_start();
if(!isset($_SESSION['admin_ses']) || $_SESSION['admin_ses'] != "hvrs@#p9w84r".session_id())
{
  header("location:login.php");
  exit;
}
?>