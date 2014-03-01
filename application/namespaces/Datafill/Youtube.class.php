<?php
class Datafill_Youtube {
	private $baseUri = "https://www.googleapis.com/youtube/v3/";
	private $apiKey = "AIzaSyDG4sP-_CavXkqPjZiSEg7CNt0ZxVMFH00";
	
	public function getVideosByChannelId( $channelId, $page = null )
	{
		$ch = curl_init( $this->buildUri( $channelId, $page ) );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		try {
			$json = curl_exec($ch);
		} catch (Exception $e) {
			return("fail");
		}
		
		return( $json );
	}
	
	private function buildUri( $channelId, $page )
	{
		$method = "search";
		$part = "id%2Csnippet";
		$fields = "items(id%2Ckind%2Csnippet)";
		$uri = $this->baseUri . $method . "?part=" . $part . "&channelId=" . $channelId . "&fields=" . $fields . "&key=" . $this->apiKey;
		return $uri;
	}
}