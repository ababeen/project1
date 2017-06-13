<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Create mailing array
$mailing = array(
    'format' => 'html',
    'subject' => 'MAILING SUBJECT',
    'body' => 'MAILING BODY',
    'fromname' => 'MAILING SENDER NAME',
    'fromemail' => 'MAILING SENDER EMAIL'
);

// Create mailing
$mailing = $em->mailings->create($mailing);

// Echo
echo 'Result of POST /api/1.0/mailings<br /><br />';
echo '<pre>'.var_dump($mailing).'</pre>';