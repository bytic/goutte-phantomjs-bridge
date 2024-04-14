<?php
declare(strict_types=1);

namespace ByTIC\GouttePhantomJs\Clients;

use Symfony\Component\BrowserKit\CookieJar;
use Symfony\Component\BrowserKit\History;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class ClientFactory
 * @package ByTIC\GouttePhantomJs\Clients
 */
class ClientFactory
{
    /**
     * @return HttpBrowser
     */
    public static function getGenericClient()
    {
        return self::getPhantomJsClient();
    }

    /**
     * @return HttpBrowser
     */
    public static function getHttpClient(
        HttpClientInterface $client = null,
        History $history = null,
        CookieJar $cookieJar = null
    ) {
        $client = new HttpBrowser($client, $history, $cookieJar);
        $client->setServerParameter('HTTP_USER_AGENT',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0');

        return $client;
    }

    /**
     * @return HttpBrowser
     */
    public static function getPhantomJsClient(History $history = null, CookieJar $cookieJar = null)
    {
        $phantomJsClient = static::getPhantomJsClientBridge();
        $client = self::getHttpClient($phantomJsClient, $history, $cookieJar);

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
