<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$mailings = $em->mailings->get('drafts', 'PAGE NUMBER');

// Echo
echo 'Result of GET /api/1.0/mailings/drafts<br /><br />';
echo '<pre>'.var_dump($mailings).'</pre>';