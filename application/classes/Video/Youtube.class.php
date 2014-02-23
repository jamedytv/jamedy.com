<?php
class Video_Youtube extends Video_Longtail{
	public $videoId = null;
	public $publishedAt = null;
	public $title = null;
	public $description = null;
	public $thumbnails = array( 'default' => null, 'medium' => null, 'high' => null );
	
}