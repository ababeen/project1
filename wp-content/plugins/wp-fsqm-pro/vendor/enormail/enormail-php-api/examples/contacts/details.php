<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Unsubscribe contact
$contact = $em->contacts->details('THE LISTID', 'CONTACT EMAIL');

// Echo
echo 'Result of GET /api/1.0/contacts/{listid}?email={email}<br /><br />';
echo '<pre>'.$contact.'</pre>';