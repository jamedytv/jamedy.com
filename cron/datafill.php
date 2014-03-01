<?php
require_once 'startup.php';

$datafill = new Datafill_Utility();
$videos = parse_ini_file( APPLICATION_PATH . "/namespaces/Datafill/datafill.ini" );
$data = $datafill->getYoutubeVideoData( $videos );
$videos = $datafill->parseYoutubeVideoData( $data );