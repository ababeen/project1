<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$list = $em->lists->details('YOUR LISTID');

// Echo
echo 'Result of GET /api/1.0/lists/{listid}<br /><br />';
echo '<pre>'.var_dump($list).'</pre>';