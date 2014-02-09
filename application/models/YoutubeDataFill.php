<?php

class DataFill {
	public function __construct()
	{
		
	}
	
	public function getResults()
	{
	  $client = new Google_Client();
	  $client->setDeveloperKey(DEVELOPER_KEY);
		
	  $youtube = new Google_YoutubeService($client);
		
	  try 
	  {
		$searchResponse = $youtube->search->listSearch('id,snippet', array(
				'q' => $_GET['q'],
				'maxResults' => $_GET['maxResults'],
		));
	}
}