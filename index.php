
<?php
$hostname = gethostname();
$date = date('d-m-Y h:i:s a', time());
$myObj = new stdClass();
$myObj->pod = $hostname;
$myObj->fecha = $date;
$myJSON = json_encode($myObj);
echo $myJSON;
?>
<p>version5</p>
muertePosterior: Sin informaci▒n
responsableInformeAt: Juan P▒rez
  
