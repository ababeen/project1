<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$contacts = $em->contacts->get('YOUR LISTID', 'bounced');

// Echo
echo 'Result of GET /api/1.0/contacts/{listid}/bounced<br /><br />';
echo '<pre>'.var_dump($contacts).'</pre>';