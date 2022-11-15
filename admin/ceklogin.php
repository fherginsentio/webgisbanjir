<?php

require_once 'koneksi.php';

// username and password sent from form
$myusername=str_replace("'","",$_POST['username']);
$mypassword=md5($_POST['password']);

$sql="SELECT * FROM tb_admin WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if(mysql_num_rows($result)>0){
$query = mysql_query("UPDATE tb_admin SET current_login = now() WHERE username = '$myusername'");
session_start();
		$_SESSION['admin']=$myusername;
		$_SESSION['level']="admin";
		$_SESSION['agent']=md5($_SERVER['HTTP_USER_AGENT']);
		header("location:index.html");
}
else{
echo "<script>alert('Login gagal!'); document.location.href=\"login.php\"</script>";
}
?>