<?php

namespace Champion;

use Champion\Exceptions\BaseException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class Client
{
    /** @var GuzzleClient */
    private static $client;

    /**
     * Client constructor.
     */
    private static function buildClient()
    {
        self::$client = new GuzzleClient([
            'base_uri' => 'http://api.champion.gg/'
        ]);
    }

    public static function request($method, $uri, $options = [])
    {
        if (! self::$client) {
            self::buildClient();
        }

        try {
            $response = self::$client->request($method, $uri, $options);
        } catch (RequestException $e) {
            // TODO: Handle Champion.gg exceptions
            throw new BaseException($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }

    public static function get($uri, $page = null, $limit = null)
    {
        $options = [
            'query' => [
                'api_key' => ChampionApi::getApiKey(),
            ]
        ];

        if (isset($page)) {
            $options['query']['page'] = $page;
        }

        if (isset($limit)) {
            $options['query']['limit'] = $limit;
        }

        return self::request('GET', $uri, $options);
    }
}
