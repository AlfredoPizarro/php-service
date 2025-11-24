<?php
// 1. Determine the Client IP
// OpenShift Routers pass the real client IP in the HTTP_X_FORWARDED_FOR header.
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // The header may contain a list (e.g. "ClientIP, Proxy1, Proxy2"). 
    // We take the first one.
    $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $client_ip = trim($ip_list[0]);
} else {
    // Fallback if accessed directly (internal cluster traffic)
    $client_ip = $_SERVER['REMOTE_ADDR'];
}

// 2. Log the IP
// In OpenShift/Docker, we write to 'stderr' (using error_log) 
// so the log stream is captured by the OpenShift logging stack (EFK/Loki).
error_log("Incoming request from Client IP: " . $client_ip);

// 3. Generate Response
$hostname = gethostname();
$date = date('d-m-Y h:i:s a', time());

$myObj = new stdClass();
$myObj->pod = $hostname;
$myObj->fecha = $date;

$myJSON = json_encode($myObj);
echo $myJSON;
?>
  
