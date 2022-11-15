<?php
header('Content-Type: application/json');

$link = mysql_connect('localhost','root','');
mysql_select_db('gispln', $link);

$act = isset($_GET['act']) ? $_GET['act'] : null;

$petugas = trim(urldecode($_GET['petugas']));
$rbm = trim(urldecode($_GET['rbm']));

if($rbm=="PILIH"){
	$sql = "SELECT lokasi.*, icon.logo as penanda
		FROM lokasi 
		LEFT OUTER JOIN icon on icon.logodaya = lokasi.daya
		WHERE petugas='$petugas'
		ORDER BY idpel
		";
}else{
	$sql = "SELECT lokasi.*, icon.logo as penanda
		FROM lokasi 
		LEFT OUTER JOIN icon on icon.logodaya = lokasi.daya
		WHERE petugas='$petugas' AND rbm1='$rbm'
		ORDER BY idpel
		";
}

$data   = mysql_query($sql);
$json   = array();
$output = array();
$i = 0;

if (!empty($data)) {
	$json = '{"data": {';
	$json .= '"lokasi":[ ';
	while($x = mysql_fetch_array($data)){
	    $json .= '{';
	    $json .= '"idpel":"'.$x['idpel'].'",
	    		 "nama":"'.htmlspecialchars_decode($x['namapel']).'",
	    		 "alamat":"'.htmlspecialchars_decode($x['alamat']).'",
			     "latitude":"'.$x['latitude'].'",
			     "longitude":"'.$x['longitude'].'",
			     "tarif":"'.$x['tarif'].'",
				 "daya":"'.$x['daya'].'",
				 "rbm":"'.$x['rbm'].'",
				 "rbm1":"'.$x['rbm1'].'",
				 "petugas":"'.$x['petugas'].'",
				 "penanda":"'.$x['penanda'].'"
	             },';
	}
 
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	$json .= '}}';
	 
	echo $json;
} 
