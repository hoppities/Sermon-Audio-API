<?php namespace Hoppities\SermonAudio;

use Guzzle\Http\Client;

class SermonAudio {

	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'https://api.sermonaudio.com/v1/node/sermons_by_source'
		]);
	}

	public function getSermons($broadcasterID)
	{
		$request = $this->client->get('sermons_by_source',[
			'query' => [
				'apikey' => 'D0DBA1BE-6E95-4233-B5C2-46A4A39CED64',
				'page' => 1,
				'pagesize' => 10,
			]
		]);

		dd($request->json());
	}
}