<?php  
session_start();

session_unset();
session_destroy();

header("Location: multi_user_login.php");
