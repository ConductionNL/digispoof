<?php
// src/Service/BRPService.php
namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp\Client;

class RequestTypeService
{
	private $params;
	private $client;
	
	public function __construct(ParameterBagInterface $params)
	{
		$this->params = $params;
		
		$this->client= new Client([
				// Base URI is used with relative requests
				'base_uri' => 'http://vtc.zaakonline.nl',
				// You can set any number of default request options.
				'timeout'  => 4000.0,
				'body' => 'raw data',
		]);
	}
	
	public function getRequestTypes($query)
	{
	    $response = $this->client->request('GET','/requests_types', [
	        'headers' => [
	            //'x-api-key' => '64YsjzZkrWWnK8bUflg8fFC1ojqv5lDn'
	        ]
	    ]
	        );
	    
	    $response = json_decode($response->getBody(), true);
	    return $response['_embedded']['item'];
	}
	
	public function getRequestType($id)
	{
		$response = $this->client->request('GET','/requests_types/'.$id, [
				'headers' => [
						//'x-api-key' => '64YsjzZkrWWnK8bUflg8fFC1ojqv5lDn'
				]
		]
				);
		
		$response = json_decode($response->getBody(), true);
		return $response;
	}
	
	public function getRequestTypeOnUri($uri)
	{
		$response = $this->client->request('GET',$uri, [
				'headers' => [
						//'x-api-key' => '64YsjzZkrWWnK8bUflg8fFC1ojqv5lDn'
				]
			]
		);
		
		$response = json_decode($response->getBody(), true);
		return $response;
	}
	
	
	public function createRequestType($request)
	{
		$response = $this->client->request('POST','/requests_types', [
				'json' => $request,
				'headers' => [
						//'x-api-key' => '64YsjzZkrWWnK8bUflg8fFC1ojqv5lDn'
				]
			]
		);
		
		$response = json_decode($response->getBody(), true);
		return $response;
	}
	
	
	public function updateRequestType($request)
	{
		$response = $this->client->request('PUT','/requests_types/'.$request['id'], [
				'json' => $request,
				'headers' => [
						//'x-api-key' => '64YsjzZkrWWnK8bUflg8fFC1ojqv5lDn'
				]
			]
		);
		
		$response = json_decode($response->getBody(), true);
		return $response;
	}
	
}
