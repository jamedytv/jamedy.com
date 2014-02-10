<?php

class Application_Model_YoutubeDataFill {
	public function __construct()
	{
		
	}
	
	public function getResults()
	{
	  $client = new Google_Client();
	  $client->setDeveloperKey(DEVELOPER_KEY);
		
	  $youtube = new Google_Service_Youtube($client);
	  print_r($youtube);
	  die();
		
	  try 
	  {
		$searchResponse = $youtube->search->listSearch('id,snippet', array(
				'q' => $_GET['q'],
				'maxResults' => $_GET['maxResults'],
		));
	  } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	}
}