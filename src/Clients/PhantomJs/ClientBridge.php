<?php

namespace ByTIC\GouttePhantomJs\Clients\PhantomJs;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use JonnyW\PhantomJs\Client as PhantomJsBaseClient;
use PhantomInstaller\PhantomBinary;
use Psr\Http\Message\RequestInterface;

/**
 * Class PhantomJsClientBridge
 * @package ByTIC\GouttePhantomJs\Clients\PhantomJs
 */
class ClientBridge implements GuzzleClientInterface
{
    protected $phantomJsClient = null;

    /**
     * @inheritdoc
     */
    public function request($method, $uri = '', array $parameters = [])
    {
        $client  = $this->getPhantomJsClient();
        $request = $this->createRequest($client, $method, $uri, $parameters);

        /**
         * @see \JonnyW\PhantomJs\Http\Response
         **/
        $response = $client->getMessageFactory()->createResponse();

        // Send the request
        $client->send($request, $response);

        return ResponseFormatter::format($response);
    }

    /**
     * @inheritdoc
     */
    public function requestAsync($method, $uri = '', array $options = [])
    {
    }

    /**
     * @inheritdoc
     */
    public function send(RequestInterface $request, array $options = [])
    {
    }

    /**
     * @inheritdoc
     */
    public function sendAsync(RequestInterface $request, array $options = [])
    {
    }

    /**
     * @inheritdoc
     */
    public function getConfig($option = null)
    {
    }

    /**
     * @param PhantomJsBaseClient $client
     * @param $method
     * @param string $uri
     * @param array $parameters
     *
     * @return \JonnyW\PhantomJs\Http\RequestInterface
     */
    protected function createRequest($client, $method, $uri = '', array $parameters = [])
    {
        /**
         * @see \JonnyW\PhantomJs\Http\Request
         **/
        $request = $client->getMessageFactory()->createRequest($uri, $method);
        $request->addHeader(
            'User-Agent',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0'
        );

        $request->addHeader(
            'Content-Type',
            'application/x-www-form-urlencoded'
        );

        if (isset($parameters['form_params'])) {
            $request->setRequestData($parameters['form_params']);
        }

        return $request;
    }

    /**
     * @return PhantomJsBaseClient|null
     */
    protected function getPhantomJsClient()
    {
        if ($this->phantomJsClient === null) {
            $this->phantomJsClient = PhantomJsBaseClient::getInstance();
            $this->phantomJsClient->getEngine()->setPath(PhantomBinary::getBin());
        }

        return $this->phantomJsClient;
    }
}
