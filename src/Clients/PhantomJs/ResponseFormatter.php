<?php

namespace ByTIC\GouttePhantomJs\Clients\PhantomJs;

use JonnyW\PhantomJs\Http\ResponseInterface as JonnyWResponseInterface;
use Symfony\Component\BrowserKit\Response as BrowserKitResponse;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class ResponseBridge
 * @package ByTIC\GouttePhantomJs\Clients\PhantomJs
 */
class ResponseFormatter
{

    /**
     * ResponseBridge constructor.
     * @param \JonnyW\PhantomJs\Http\Response|\JonnyW\PhantomJs\Http\ResponseInterface $phantomJsResponse
     * @return BrowserKitResponse
     */
    public static function format(JonnyWResponseInterface $phantomJsResponse): ResponseInterface
    {
        $content = $phantomJsResponse->getContent();
        $status = $phantomJsResponse->getStatus();
        $headers = $phantomJsResponse->getHeaders();

        return new BrowserKitResponse($content, $status, $headers);
    }
}
