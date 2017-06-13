<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$form = $em->forms->embed('YOUR FORM ID');

// Echo
echo 'Result of GET /api/1.0/forms/{formid}/html<br /><br />';
echo '<pre>'.var_dump($form).'</pre>';