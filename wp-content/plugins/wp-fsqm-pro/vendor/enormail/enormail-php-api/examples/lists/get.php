<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Fetch contacts
$lists = $em->lists->get('PAGE NUMBER', 'SORT ON COLUMN (weight|title|created)', 'SORT ORDER (asc|desc)');

// Echo
echo 'Result of GET /api/1.0/lists<br /><br />';
echo '<pre>'.var_dump($lists).'</pre>';