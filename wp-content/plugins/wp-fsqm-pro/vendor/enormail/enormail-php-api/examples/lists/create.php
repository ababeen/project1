<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Create list
$list = $em->lists->create('LIST TITLE', 'SEND NOTIFICATION MAIL ON SUBSCRIBE (0|1)', 'NOTIFICATION E-MAIL ADDRESS');

// Echo
echo 'Result of POST /api/1.0/lists<br /><br />';
echo '<pre>'.var_dump($list).'</pre>';