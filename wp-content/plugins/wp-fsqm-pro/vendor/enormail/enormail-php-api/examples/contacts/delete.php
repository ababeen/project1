<?php
// Create new api instance
$em = new Enormail\ApiClient('YOUR APIKEY', 'RESPONSE FORMAT (JSON|XML)');

// Delete contact
$result = $em->contacts->unsubscribe('THE LISTID', 'CONTACT EMAIL');

// Echo
echo 'Result of DELETE /api/1.0/contacts/{listid}/delete<br /><br />';
echo '<pre>'.var_dump($result).'</pre>';