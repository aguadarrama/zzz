<?php
$conn = mysqli_connect("127.0.0.1","root","","abc");
$stringQuery = "SELECT * FROM instructor";
$result = mysqli_query($conn,$stringQuery);
echo "<table class='table table-sm table-striped'><thead>";
echo "<tr><th>Instructor</th><th>Lugar de Salida</th><th>Distancia</th><th>Tiempo</th><th>Velocidad</th><tr></thead><tbody>";
while ($row = mysqli_fetch_array($result)) {
	// LEE LA DIRECCION Y LA CODIFICA PARA EL USO EN EL API
	$data = fn_search(utf8_encode($row['address']),$_POST['state'],$_POST['city'],$_POST['municipality'],$_POST['suburb'],$_POST['code']);
	// EL FORMATO DE REGRESO ES JSON DENTRO DE UN STRING/DECODIFICA EL JSON Y LO CONVIERTE A ARRAY
	// LEE LA DISTANCIA Y EL TIEMPO DE LLEGADA/CALCULA LA VELOCIDAD DE LLEGADA
	$dataArray = json_decode($data,true);
	$distance = floatval($dataArray['rows'][0]['elements'][0]['distance']['value'])/1000;
	$distanceTxt = $dataArray['rows'][0]['elements'][0]['distance']['text'];
	$duration = floatval($dataArray['rows'][0]['elements'][0]['duration']['value'])/60/60;
	$durationTxt = $dataArray['rows'][0]['elements'][0]['duration']['text'];
	$velocity = round($distance/$duration,2);
	//$velocity = 0;
	?>
	<tr>
		<td><?=$row['name']?></td>
		<td><?=utf8_encode($row['address'])?></td>
		<td><?=$distanceTxt?></td>
		<td><?=$durationTxt?></td>
		<td><?=$velocity?></td>
	</tr>
	<?php
}
echo "</tbody></table>";

function fn_search($xorigins,$state,$city,$municipality,$suburb,$code){
	$xorigins = urlencode($xorigins);
	$ch = curl_init();
	$origins = $xorigins;
	// Blvd. Luis Donaldo Colosio 2635, Los Rodríguez, 25200 Saltillo, Coah.
	#$code = "25200";
	#$suburb = "Los Rodríguez";
	#$municipality = "Saltillo";
	#$city = "Saltillo";
	#$state = "Coahuila de Zaragoza";

	//$destinations = "saltillo";
	$destinations = urlencode($suburb.", ".$code." ".$municipality.", ".$city.",".$state);
	//echo $destinations;
	curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origins."&destinations=".$destinations."&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	#echo $output;
	return $output;
}
