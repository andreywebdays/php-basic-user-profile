<?php

session_start();
include_once 'dbh.php';
$user_id = $_SESSION['user_id'];

if (isset($_POST['submit_upload'])) 
{
    $file = $_FILES['file'];

    $file_name = $_FILES['file']['name'];  // we can also use $file['name'] instead
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    $file_ext = explode('.', $file_name); // create an array of strings divided by dot
    $file_actual_ext = strtolower(end($file_ext)); // take the last string in the array and change it (extension) to lowercase in case we received it with uppercase characters

    $allowed_ext = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($file_actual_ext, $allowed_ext)) {
        if ($file_error === 0) 
        {
            if ($file_size < 500000) // if less then 500000bytes ~ 500kb ~ 0.5mb
            { 
                // generate unique file name from a current timestamp and add extension
                $file_name_new = "profile_".$user_id.".".$file_actual_ext; 
                $file_destination = 'uploads/'.$file_name_new;
                move_uploaded_file($file_tmp, $file_destination);
                $sql = "UPDATE profile_imgs SET profile_img_status = 0 WHERE user_id = '$user_id';";
                $result = mysqli_query($conn, $sql);
                header("location: index.php?upload-success"); // go back to original location
            }
            else
            {
                echo "Your file is too big!";
            }
        } 
        else 
        {
            echo "The was an error uploading your file!";
        }
    } 
    else 
    {
        echo "You can not upload files of this type!";
    }
}