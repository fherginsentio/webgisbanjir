<?php

header('Content-Type: application/json');

$link = mysql_connect('localhost','root','');
mysql_select_db('gisshelterpadang', $link);

$position = explode(',', trim(urldecode($_GET['position'])));


$sql = "SELECT idshelter,namashelter,alamatshelter,latitude,longitude,fungsi,jumlahlantai,dayatampung,markershelter.marker as penanda
		FROM daftarshelter
		LEFT OUTER JOIN markershelter on markershelter.fungsimarker = daftarshelter.fungsi
		ORDER BY idshelter
		";


$data   = mysql_query($sql);
$json   = array();
$output = array();
$i = 0;

if (!empty($data)) {
	$json = '{"data": {';
	$json .= '"shelter":[ ';
	while($x = mysql_fetch_array($data)){
	    $json .= '{';
	    $json .= '
				 "idshelter":"'.htmlspecialchars_decode($x['idshelter']).'",
				 "namashelter":"'.htmlspecialchars_decode($x['namashelter']).'",
	    		 "alamat":"'.htmlspecialchars_decode($x['alamatshelter']).'",
			     "latitude":"'.$x['latitude'].'",
			     "longitude":"'.$x['longitude'].'",
				 "jumlahlantai":"'.$x['jumlahlantai'].'",
				 "fungsi":"'.$x['fungsi'].'",
				 "dayatampung":"'.$x['dayatampung'].'",
				 "penanda":"'.$x['penanda'].'"
	             },';
	}
 
	$json = substr($json,0,strlen($json)-1);
	$json .= ']';
	$json .= '}}';
	 
	echo $json;
} 
