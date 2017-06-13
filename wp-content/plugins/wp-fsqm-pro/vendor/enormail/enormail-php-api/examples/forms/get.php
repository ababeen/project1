<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$forms = $em->forms->get();

// Echo
echo 'Result of GET /api/1.0/forms<br /><br />';
echo '<pre>'.var_dump($forms).'</pre>';