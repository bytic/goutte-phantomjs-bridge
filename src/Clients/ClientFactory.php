<?php

namespace ByTIC\GouttePhantomJs\Clients;

use Goutte\Client;

/**
 * Class ClientFactory
 * @package ByTIC\GouttePhantomJs\Clients
 */
class ClientFactory
{
    /**
     * @return Client
     */
    public static function getGenericClient()
    {
        return self::getPhantomJsClient();
    }

    /**
     * @return Client
     */
    public static function getGoutteClient($client = null)
    {
        $client = new Client($client);
        $client->setServerParameter('HTTP_USER_AGENT',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0');

        return $client;
    }

    /**
     * @return Client
     */
    public static function getPhantomJsClient()
    {
        $phantomJsClient = new PhantomJs\ClientBridge();
        $client = self::getGoutteClient($phantomJsClient);
        return $client;
    }
}
