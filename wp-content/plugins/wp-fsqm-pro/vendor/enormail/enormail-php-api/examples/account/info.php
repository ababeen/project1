<?php
// Create new api instance
$em = new \Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch account info
$account = $em->account->info();

// Echo
echo 'Result of GET /api/1.0/account<br /><br />';
echo '<pre>'.var_dump($account).'</pre>';