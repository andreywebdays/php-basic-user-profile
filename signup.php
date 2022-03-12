<?php

include_once 'dbh.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO users (user_fn, user_ln, user_un, user_pwd) 
    VALUES ('$first_name', '$last_name', '$username', '$pwd')";

mysqli_query($conn, $sql);

