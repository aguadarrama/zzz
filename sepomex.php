<?php
$cp = $_GET['cp'];
#-------------------------------------------------
//$abc = "mexico";
//$api ="AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A";
//for($i=1;$i<5;$i++){
$ch = curl_init();
//$origins = "monterrey";
//$destinations = "saltillo";
curl_setopt($ch, CURLOPT_URL, "https://api-sepomex.hckdrk.mx/query/info_cp/".$cp."?type=simplified&token=94a5eaf0-8cf7-4498-bd9e-de43563a98dd");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
//}