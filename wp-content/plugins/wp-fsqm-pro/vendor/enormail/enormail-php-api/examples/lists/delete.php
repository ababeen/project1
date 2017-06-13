<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Delete contact
$result = $em->lists->delete('THE LISTID');

// Echo
echo 'Result of DELETE /api/1.0/lists/{listid}/delete<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';