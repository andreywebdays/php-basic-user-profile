<?php

session_start();
include_once 'dbh.php';

$user_id = $_SESSION['user_id'];

$file_name = "uploads/profile_".$user_id."*";

$file_info = glob($file_name); // print_r($file_info);

$file_ext = explode(".", $file_info[0]);

$file_actual_ext = $file_ext[1];

$file = "uploads/profile_".$user_id.".".$file_actual_ext;

if (!unlink($file)) // unlink is the function to delete the file
{
    echo "File was not deleted!";
}
else
{
    echo "File was deleted successfully!";
}

$sql = "UPDATE profile_imgs SET profile_img_status = 1 WHERE user_id = '$user_id';";

mysqli_query($conn, $sql);

header("Location: index.php?delete-success");