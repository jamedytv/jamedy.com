<?php 
require_once 'startup.php';

$channels = array( "JamedyTv" => "UCUmVcerQgMg0C7bfosM-WwA"
				  ,"BreakfastClub" => "UCYgKGmAFebxpIF_dTs36qFQ"	
				  ,"VladTv" => "UCg7lal8IC-xPyKfgH4rdUcA"
				  ,"JumpOffTv" => "UCvlIAlpP2I4KQSkX2Nr3M-w"
				  ,"FuseTv" => "UCi_XQVMRd0hrj6Ka0yCnR3A"
				 );

$youtube = new Application_Model_Youtube();



foreach( $channels as $channel=>$channelId )
{
	$response = $youtube->getVideosByChannelId("UCUmVcerQgMg0C7bfosM-WwA");
	$response = json_decode($response);
	
	foreach( $response->items as $item)
	{
		if($item->id->kind == "youtube#video")
		{
			$video = new Video_Youtube();
			$video->videoId = $item->id->videoId;
			$video->publishedAt = $item->snippet->publishedAt;
			$video->title = $item->snippet->title;
			$video->description = $item->snippet->description;
			$video->thumbnails['default'] = $item->snippet->thumbnails->default->url;
			$video->thumbnails['medium'] = $item->snippet->thumbnails->medium->url;
			$video->thumbnails['high'] = $item->snippet->thumbnails->high->url;
			print_r($video);
		}
	}
}

