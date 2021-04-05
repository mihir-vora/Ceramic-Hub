<?php
session_start();
include("includes/server.php");
unset($_SESSION["id"]);
unset($_SESSION["email"]);

session_destroy();
$_SESSION['errmsg']="You have successfully logout";
header("Location:login.php");

?>

