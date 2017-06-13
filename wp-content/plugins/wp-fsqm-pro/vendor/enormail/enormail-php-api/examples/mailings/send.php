<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Send mailing
$result = $em->mailings->send('YOUR MAILING ID', array('LIST ID 1', 'LIST ID 2'), 'SCHEDULE MAILING AT (YYYYMMDDHHIISS | NOW)');

// Echo
echo 'Result of POST /api/1.0/mailings/{mailingid}/send<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';