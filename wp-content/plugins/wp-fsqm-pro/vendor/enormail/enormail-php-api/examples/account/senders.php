<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$senders = $em->account->senders();

// Echo
echo 'Result of GET /api/1.0/account/senders<br /><br />';
echo '<pre>'.var_dump($senders).'</pre>';