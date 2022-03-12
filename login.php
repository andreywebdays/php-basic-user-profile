<?php

session_start();

if (isset($_POST['submit_login'])) 
{
    $_SESSION['user_id'] = 1;
    header("Location: index.php");
}