<?php
header('Content-Type: application/json');

$link = mysql_connect('localhost','root','');
mysql_select_db('gispln', $link);

$position = explode(',', trim(urldecode($_GET['position'])));

$sql = "SELECT lokasi.*,(6371 * acos(cos(radians(".$position[0].")) 
		* cos(radians(latitude)) * cos(radians(longitude) 
		- radians(".$position[1].")) + sin(radians(".$position[0].")) 
		* sin(radians(latitude)))) 
		AS jarak, icon.logo as penanda
		FROM lokasi
		LEFT OUTER JOIN icon on icon.logodaya = lokasi.daya
		ORDER BY jarak
		limit 5
		";


$data   = mysql_query($sql);
$json   = array();
$output = array();
$i = 0;

if (!empty($data)) {
	$json = '{"data": {';
	$json .= '"atm":[ ';
	while($x = mysql_fetch_array($data)){
	    $json .= '{';
	    $json .= '"idpel":"'.$x['idpel'].'",
	    		 "nama":"'.htmlspecialchars_decode($x['namapel']).'",
	    		 "alamat":"'.htmlspecialchars_decode($x['alamat']).'",
			     "latitude":"'.$x['latitude'].'",
			     "longitude":"'.$x['longitude'].'",
			     "tarif":"'.$x['tarif'].'",
				 "daya":"'.$x['daya'].'",
				 "penanda":"'.$x['penanda'].'"
	             },';
	}
 
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	$json .= '}}';
	 
	echo $json;
} 
