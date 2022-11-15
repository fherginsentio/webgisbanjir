<?php
$link = mysql_connect('localhost','root','');
mysql_select_db('gisshelterpadang', $link);

$position = explode(',', trim(urldecode($_GET['position'])));
$sql = "SELECT daftarshelter.*,
	(6371 * acos(cos(radians(".$position[0].")) * cos(radians(latitude)) * cos(radians(longitude) - radians(".$position[1].")) +
	sin(radians(".$position[0]."))* sin(radians(latitude))))AS jarak,
	markershelter.marker as penanda
	FROM daftarshelter
	LEFT OUTER JOIN markershelter on markershelter.fungsimarker = daftarshelter.fungsi
	ORDER by jarak
	limit 3";
$data   = mysql_query($sql);
$xml   = "<xml>";
if (!empty($data)) {
	while($x = mysql_fetch_array($data)){
		$xml   .= "<marker title=\"".htmlspecialchars_decode($x['namashelter'])."\" mode=\"DRIVING\" startlat=\"".$position[0]."\" startlng='".$position[1]."' endlat='".$x['latitude']."' endlng='".$x['longitude']."'></marker>";
	}
}
$xml   .= "</xml>";
header("Content-type: text/xml");
echo($xml);
?>