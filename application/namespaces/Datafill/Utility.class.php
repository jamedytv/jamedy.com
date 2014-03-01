<?php 
class Datafill_Utility {

	private $youtube = null;

	public function __construct( Datafill_Youtube $youtube = null )
	{
		if ( $youtube )
		{
			$this->youtube = $youtube;
		} else {
			$this->youtube = new Datafill_Youtube();
		}
	}
	
	public function getYoutubeVideoData( $channels, $since )
	{
		foreach ( $channels as $channel )
		{
			$data = $youtube->getVideosByChannelId( $channel );
		}
		return $data;
	}
	
	public function parseYoutubeVideoData( $data )
	{
		$videos = array();
		$data = json_decode($data);
		
		foreach ( $data->items as $item)
		{
			if ($item->id->kind == "youtube#video")
			{
				$video = new Video_Youtube();
				$video->videoId = $item->id->videoId;
				$video->publishedAt = $item->snippet->publishedAt;
				$video->title = $item->snippet->title;
				$video->description = $item->snippet->description;
				$video->thumbnails['default'] = $item->snippet->thumbnails->default->url;
				$video->thumbnails['medium'] = $item->snippet->thumbnails->medium->url;
				$video->thumbnails['high'] = $item->snippet->thumbnails->high->url;
				$video->tags = $this->createVideoTags( $video->title, $video->description );

				$videos[] = $video;
			}
		}	
	}

	public function createVideoTags( $title, $description )
	{
		$titleArray = explode( " ", $title );
		$descriptionArray = explode( " ", $description );
		
		$conjunctions = array ( 'for', 'and', 'nor', 'but', 'or', 'yet', 'so' );
		//Remove conjunctions
		//Check for duplicates
		
		return //Merge Arrays
	}
}

