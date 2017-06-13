<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Send mailing
$result = $em->mailings->delete('YOUR MAILING ID');

// Echo
echo 'Result of DELETE /api/1.0/mailings/{mailingid}/delete<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';