<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Create mailing
$mailing = $em->mailings->stats('YOUR MAILING ID');

// Echo
echo 'Result of POST /api/1.0/mailings/{mailingid}/stats<br /><br />';
echo '<pre>'.var_dump($mailing).'</pre>';