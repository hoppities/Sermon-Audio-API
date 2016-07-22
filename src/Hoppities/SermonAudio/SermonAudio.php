<?php namespace Hoppities\SermonAudio;

use GuzzleHttp\Client;

class SermonAudio {

	protected $client;

	protected $apiKey;

	public function __construct($apiKey)
	{
		$this->apiKey = $apiKey;

		$this->client = new Client([
			'headers' => ['X-Api-Key' => $this->apiKey ];
			'base_uri' => 'https://api.sermonaudio.com/v1/node/'
		]);
	}

	public function getSermonInfo($sermonID)
	{
		$params = ['sermonID' => $sermonID];
		$request = $this->client->get( 'sermon_info', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSermonsBySource($sourceID)
	{
		$params = ['sourceID' => $sourceID];
		$request = $this->client->get( 'sermons_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSermonsBySpeaker($speakerDisplayName)
	{
		$params = ['speakerName' => $speakerDisplayName];
		$request = $this->client->get( 'sermons_by_speaker', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	// Array of params
	public function getSermonsByBibref($paramsArr)
	{
		$params = $paramsArr;
		$request = $this->client->get( 'sermons_by_bibref', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getBibrefBooksBySource($sourceID)
	{
		$params = ['sourceID' => $sourceID];
		$request = $this->client->get( 'bibref_books_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getBibrefChaptersBySource($sourceID)
	{
		$params = ['sourceID' => $sourceID];
		$request = $this->client->get( 'bibref_chapters_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getGalleryItemsForCategory($categoryName, $includeCoverImage = true)
	{
		$params = ['category' => $categoryName, 'include_cover_image' = $includeCoverImage];
		$request = $this->client->get( 'gallery_items_for_category', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSourceInfo($sourceID)
	{
		$params = ['sourceID' => $sourceID];
		$request = $this->client->get( 'source_info', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getWebcastsInProgress()
	{
		$request = $this->client->get( 'webcasts_in_progress', ['headers' => $headers])->getBody();

		return $request;
	}
}