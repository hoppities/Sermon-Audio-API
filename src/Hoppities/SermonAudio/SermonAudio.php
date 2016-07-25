<?php namespace Hoppities\SermonAudio;

use GuzzleHttp\Client;

class SermonAudio {

	protected $client;

	protected $apiKey;

	public function __construct($apiKey, $sourceID, $baseUri)
	{
		$this->apiKey = $apiKey;
		$this->sourceID = $sourceID;

		$this->client = new Client([
			'headers' => ['X-Api-Key' => $this->apiKey ],
			'base_uri' => $baseUri
		]);
	}

	public function getSermonInfo($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermon_info', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSermonsBySource($userParams = null)
	{
		$params = $this->setParams($userParams, true);
		$request = $this->client->get( 'sermons_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSermonsBySpeaker($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermons_by_speaker', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	// Array of params
	public function getSermonsByBibref($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermons_by_bibref', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getBibrefBooksBySource($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'bibref_books_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getBibrefChaptersBySource($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'bibref_chapters_by_source', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getGalleryItemsForCategory($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'gallery_items_for_category', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getSourceInfo($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'source_info', ['headers' => $headers, 'query' => $params ])->getBody();

		return $request;
	}

	public function getWebcastsInProgress()
	{
		$request = $this->client->get( 'webcasts_in_progress', ['headers' => $headers])->getBody();

		return $request;
	}

	private function setParams($paramsToSet = null, $setSourceID = false)
	{
		if (isset($paramsToSet))
		{
			foreach ($paramsToSet as $key => $value)
			{
				$params[$key] => $value;
			}
		}

		if ($setSoureID)
		{
			$params['source_id'] = $this->soureID;
		}

		return $params;
	}
}