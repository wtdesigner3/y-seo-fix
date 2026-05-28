<?php
require '../inc/function.php';

if (isset($_POST['chapter_id'])) {

    $chapter_id = $_POST['chapter_id'];

    $query = mysqli_query($conn, "SELECT id, name FROM tbl_service WHERE category_id='$chapter_id' AND status='1'");

    echo '<option value="">Select Chapter</option>';

    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}
?>