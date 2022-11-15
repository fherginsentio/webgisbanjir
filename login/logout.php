<?php
include "../include/config.php";

//$_SESSION=array();
unset($_SESSION['admin']);
unset($_SESSION['level']);
//setcookie('PHPSESSID','',time()-3600,'/','',0);
header("location:../index.php");
?>