<?php
//  session_start();
if ($_SERVER['SERVER_NAME'] == "localhost") {

    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ydb";
    @define('SITE_NAME', 'Yuccabe Planters | Premium Planters');
    @define('SITE_URL', 'http://localhost/y-live-back-28/');
    // @define('SITE_URL', 'https://yuccabeplanters.co.in/');
} else {
    $hostname = "localhost";
    $dbusername = "yuccabeplanters_user";
    $dbpassword = "d(gNbGe(O{dN";
    $dbname = "yuccabeplanters_db";
    @define('SITE_NAME', 'Yuccabe Planters | Premium Planters');
    @define('SITE_URL', 'https://yuccabeplanters.co.in/');
    @define('SITE_EMAIL', 'ednorthdelhicandg@gmail.com');
    @define('Captcha_Secret', '6LcKuZAsAAAAANgv1xZitG8SEs4jNLYmnApa70kS');
    @define('Captcha_Sitekey', '6LcKuZAsAAAAACJIjQSSjX-gOScY16uJPnkgUY_z');
}

$conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_contact` WHERE `con_id`='1'"));
$profile = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE `pro_id`='1'"));
?>