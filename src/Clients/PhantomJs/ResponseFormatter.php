<?php
declare(strict_types=1);

namespace ByTIC\GouttePhantomJs\Clients\PhantomJs;

use JonnyW\PhantomJs\Http\ResponseInterface as JonnyWResponseInterface;
use Symfony\Component\BrowserKit\Cookie;
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
     * @return ResponseInterface
     */
    public static function format(JonnyWResponseInterface $phantomJsResponse): ResponseInterface
    {
        return Response::fromPhantomJsResponse($phantomJsResponse);
    }

    /**
     * ResponseBridge constructor.
     * @param \JonnyW\PhantomJs\Http\Response|\JonnyW\PhantomJs\Http\ResponseInterface $phantomJsResponse
     * @return array
     */
    public static function formatCookies(JonnyWResponseInterface $phantomJsResponse): array
    {
        $phantomCookies = $phantomJsResponse->getCookies();
        $return = [];
        foreach ($phantomCookies as $phantomCookie) {
            $cookie = new Cookie(
                $phantomCookie['name'],
                $phantomCookie['value'],
                isset($phantomCookie['expiry']) ? $phantomCookie['expiry'] : null,
                $phantomCookie['path'],
                $phantomCookie['domain'],
                $phantomCookie['secure'],
                $phantomCookie['httponly']
            );
            $return[] = $cookie->__toString();
        }

        return $return;
    }
}
