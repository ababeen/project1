<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$result = $em->contacts->add('YOUR LISTID', 'CONTACT NAME', 'CONTACT EMAIL', array('EXTRA FIELDS'));

// Echo
echo 'Result of POST /api/1.0/contacts/{listid}<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';