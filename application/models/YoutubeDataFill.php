<?php
class Application_Model_YoutubeDataFill {
	
	private $uri;
	
	public function __construct( $uri )
	{
		$this->uri = $uri;	
	}
	
	public function getVideos()
	{
		$ch = curl_init($this->uri);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		try {
			$json = curl_exec($ch);
		} catch (Exception $e) {
			print("curl didn't work");
		}
		
		print_r( $json );
	}
}