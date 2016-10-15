<?php namespace Hoppities\SermonAudio;

use GuzzleHttp\Client;

class SermonAudio {

	protected $client;

	protected $apiKey;

	public function __construct($baseUri)
	{
		$this->baseUri = $baseUri;
	}

	public function Initialize($apiKey, $sourceID)
	{
		$this->apiKey = $apiKey;
		$this->sourceID = $sourceID;

		$this->client = new Client([
			'headers' => ['X-Api-Key' => $this->apiKey ],
			'base_uri' => $this->baseUri
		]);
	}

	public function GetSermonInfo($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermon_info',['query' => $params ])->getBody();

		return $request;
	}

	public function GetSermonsBySource($userParams = null)
	{
		$params = $this->setParams($userParams, true);

		$request = $this->client->get( 'sermons_by_source', ['query' => $params ]);

		if ($request)
		{
			$request = $this->parseBody($request);
		}

		return $request;
	}

	public function GetSermonsBySpeaker($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermons_by_speaker', ['query' => $params ])->getBody();

		return $request;
	}

	// Array of params
	public function GetSermonsByBibref($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'sermons_by_bibref', ['query' => $params ])->getBody();

		return $request;
	}

	public function GetBibrefBooksBySource($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'bibref_books_by_source', ['query' => $params ])->getBody();

		return $request;
	}

	public function GetBibrefChaptersBySource($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'bibref_chapters_by_source', ['query' => $params ])->getBody();

		return $request;
	}

	public function GetGalleryItemsForCategory($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'gallery_items_for_category', ['query' => $params ])->getBody();

		return $request;
	}

	public function GetSourceInfo($userParams)
	{
		$params = $this->setParams($userParams);
		$request = $this->client->get( 'source_info', ['query' => $params ])->getBody();

		return $request;
	}

	public function GetWebcastsInProgress()
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
				$params[$key] = $value;
			}
		}

		if ($setSourceID)
		{
			$params['sourceID'] = $this->sourceID;
		}

		return $params;
	}

	private function parseBody($response)
	{
		return json_decode($response->getBody());
	}
}