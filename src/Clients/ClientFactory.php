<?php

namespace ByTIC\GouttePhantomJs\Clients;

use Goutte\Client;
use Symfony\Component\BrowserKit\CookieJar;
use Symfony\Component\BrowserKit\History;
use Symfony\Contracts\HttpClient\HttpClientInterface;

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
    public static function getGoutteClient(
        HttpClientInterface $client = null,
        History $history = null,
        CookieJar $cookieJar = null
    ) {
        $client = new Client($client, $history, $cookieJar);
        $client->setServerParameter('HTTP_USER_AGENT',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0');

        return $client;
    }

    /**
     * @return Client
     */
    public static function getPhantomJsClient(History $history = null, CookieJar $cookieJar = null)
    {
        $phantomJsClient = static::getPhantomJsClientBridge();
        $client = self::getGoutteClient($phantomJsClient, $history, $cookieJar);

        return $client;
    }

    /**
     * @return PhantomJs\ClientBridge
     */
    public static function getPhantomJsClientBridge()
    {
        static $phantomJsClient;

        if ($phantomJsClient === null) {
            $phantomJsClient = new PhantomJs\ClientBridge();
        }

        return $phantomJsClient;
    }
}
