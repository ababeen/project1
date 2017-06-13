<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Send mailing
$result = $em->mailings->unschedule('YOUR MAILING ID');

// Echo
echo 'Result of POST /api/1.0/mailings/{mailingid}/unschedule<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';