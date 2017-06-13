<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Unsubscribe contact
$result = $em->contacts->unsubscribe('THE LISTID', 'CONTACT EMAIL');

// Echo
echo 'Result of POST /api/1.0/contacts/{listid}/unsubscribe<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';