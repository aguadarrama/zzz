<?php
$conn = mysqli_connect("127.0.0.1","root","","abc");
$stringQuery = "SELECT * FROM instructor";//cadena
$result = mysqli_query($conn,$stringQuery);//exdcuet
echo "<table border='1'>";
while ($row = mysqli_fetch_array($result)) {
	// LEE LA DIRECCION Y LA CODIFICA PARA EL USO EN EL API
	$data = fn_search(utf8_encode($row['address']));
	// EL FORMATO DE REGRESO ES STRING
	echo gettype($data);
	//echo utf8_encode($row['address']);
	//echo var_dump($data);
	$aaa = json_encode($data);
	echo "<br>";
	//echo $aaa;
	$bbb = json_decode($data,true);
	echo gettype($bbb);
	$distance = floatval($bbb['rows'][0]['elements'][0]['distance']['value'])/1000;
	$distanceTxt = $bbb['rows'][0]['elements'][0]['distance']['text'];
	$duration = floatval($bbb['rows'][0]['elements'][0]['duration']['value'])/60/60;
	$durationTxt = $bbb['rows'][0]['elements'][0]['duration']['text'];
	$velocity = round($distance/$duration,2);
?>
	<tr>
		<td><?=$row['name']?></td>
		<td><?=utf8_encode($row['address'])?></td>
		<td><?=$distanceTxt?></td>
		<td><?=$durationTxt?></td>
		<td><?=$velocity?></td>
	</tr>
<?php
echo "<br><br><br>";
var_dump($bbb);
echo "<b>";
print_r($bbb['rows'][0]['elements'][0]['distance']['value']);
echo "</b>";



	echo gettype($bbb);
	//echo $bbb;
	echo json_last_error();
}
echo "</table>";

$vaca = '{"destination_addresses": [ "Saltillo, Coahuila de Zaragoza, México" ],"origin_addresses":[ "Monterrey, Nuevo León, México" ],"rows":[{"elements":[{"distance":{ "text" : "86.6 km", "value" : 86572 },"duration":{ "text" : "1 h 16 min", "value" : 4563 },"status":"OK"}]}],"status":"OK"}';
$vaca = '{"destination_addresses": [ "Saltillo, Coahuila de Zaragoza, México" ],"origin_addresses":[ "Monterrey, Nuevo León, México" ],"rows":[{"elements":[{"distance":{ "text" : "86.6 km", "value" : 86572 },"duration":{ "text" : "1 h 16 min", "value" : 4563 },"status":"OK"}]}],"status":"OK"}';

echo gettype($vaca);
echo "<br>";
echo "<br>";
echo gettype(json_encode($vaca));
echo "<br>";
echo "<br>";

echo gettype(json_decode($vaca));
echo "<br>";
echo "<br>jd - ";
echo print_r(json_decode($vaca));
echo "<br>";
echo "<br>";
var_dump(json_decode($vaca));
$ooo = json_decode($vaca,true);
echo "<br>";
echo "<br>";
print_r($ooo);
echo "<br>";
echo "<br>";
print_r($ooo['destination_addresses']);
echo "<br>";
print_r($ooo['origin_addresses']);
echo "<br>";
print_r($ooo['rows']);
echo "<br>";
print_r($ooo['rows'][0]);
echo "<br>";
print_r($ooo['rows'][0]['elements']);
echo "<br>";
print_r($ooo['rows'][0]['elements'][0]);
echo "<br>";
print_r($ooo['rows'][0]['elements'][0]['distance']);
echo "<br>";
print_r($ooo['rows'][0]['elements'][0]['distance']['value']);
print_r($ooo['rows'][0]['elements'][0]['duration']['value']);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
foreach($ooo as $vvv){
	print_r($vvv);
echo "<br>";
}
//crear funcoion


function fn_search($xorigins){
	$xorigins = urlencode($xorigins);
	//$destinations = "saltillo";
	//echo ("https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$xorigins."&destinations=".$destinations."&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A");
/*
	echo $xorigins;
*/
	$ch = curl_init();
	#$origins = "monterrey";
	$origins = $xorigins;
	$destinations = "saltillo";
	curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origins."&destinations=".$destinations."&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	//echo $output;
	return $output;
}
