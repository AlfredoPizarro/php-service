<?php
date_default_timezone_set('America/Santiago');
$hostname = gethostname();
$date = date('d-m-Y h:i:s a', time());
$myObj = new stdClass();
$myObj->pod = $hostname;
$myObj->fecha = $date;
$myJSON = json_encode($myObj);
echo $myJSON;
?>