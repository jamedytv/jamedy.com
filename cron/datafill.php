<?php 

require_once dirname(dirname(__FILE__)) . '/application/models/YoutubeDataFill.php';

//$youtube = new Zend_Gdata_Youtube($client, GOOGLE_API_EMAIL_ADDRESS, GOOGLE_API_CLIENT_ID, GOOGLE_API_KEY);
$uri = 'http://gdata.youtube.com/feeds/api/users/djvlad/uploads';
$datafill = new Application_Model_YoutubeDataFill( $uri );
$datafill->getVideos();