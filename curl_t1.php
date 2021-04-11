<?php
#-------------------------------------------------
for($i=1;$i<2;$i++){
	$abc = "mexico";
	$api ="AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A";
	$ch = curl_init();
	$origins = "monterrey";
	$destinations = "saltillo";
	curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origins."&destinations=".$destinations."&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;
	//echo typeof($output);
	//var_dump($output);
	//echo "<br>";
	//echo json_decode($output);
}