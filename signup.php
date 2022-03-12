<?php

include_once 'dbh.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO users (user_fn, user_ln, user_un, user_pwd) 
    VALUES ('$first_name', '$last_name', '$username', '$pwd');";

mysqli_query($conn, $sql);

$sql = "SELECT * FROM users WHERE user_un = '$username' AND user_fn = '$first_name';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result))
    {
        $user_id = $row['user_id'];

        $sql = "INSERT INTO profile_imgs (profile_img_status, user_id) 
            VALUES (1, '$user_id');";

        mysqli_query($conn, $sql);

        header("Location: index.php");
    }
}
else
{
    echo "You have an error!";
}

