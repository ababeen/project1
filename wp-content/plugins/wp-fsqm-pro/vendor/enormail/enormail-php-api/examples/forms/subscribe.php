<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$result = $em->forms->subscribe('YOUR FORM ID', 'CONTACT NAME', 'CONTACT EMAIL');

// Echo
echo 'Result of POST /api/1.0/forms/{formid}/subscribe<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';