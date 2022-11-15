<?php
$link = mysql_connect('localhost','root','');
mysql_select_db('gispln', $link);

$act = isset($_GET['act']) ? $_GET['act'] : null;
$key = isset($_GET['id']) ? $_GET['id'] : null;

switch ($act) {
	case 'pilrbm':
		   $ambilrbm = mysql_query("select * from rbm where namapetugas='$key'");
				echo "<option>PILIH</option>";
		   while ($rbm = mysql_fetch_array($ambilrbm)){
			   
			   echo "<option>".$rbm['rbm']."</option>";
		   }
		break;
}

?>