<?php
declare(strict_types=1);

namespace ByTIC\GouttePhantomJs\Clients\PhantomJs;

use JonnyW\PhantomJs\Http\ResponseInterface as JonnyWResponseInterface;

/**
 * Class Response
 * @package ByTIC\GouttePhantomJs\Clients\PhantomJs
 */
class Response implements \Symfony\Contracts\HttpClient\ResponseInterface
{
    /**
     * Http headers array
     *
     * @var array
     * @access public
     */
    public $headers;

    /**
     * Response int
     *
     * @var string
     * @access public
     */
    public $status;

    /**
     * Response body
     *
     * @var string
     * @access public
     */
    public $content;

    /**
     * @param JonnyWResponseInterface $phantomJsResponse
     * @return static
     */
    public static function fromPhantomJsResponse(JonnyWResponseInterface $phantomJsResponse)
    {
        $response = new static();
        $response->setHeaders($phantomJsResponse->getHeaders());
        $response->setContent($phantomJsResponse->getContent());
        $response->setStatus($phantomJsResponse->getStatus());
        $response->setHeader('Set-Cookie', ResponseFormatter::formatCookies($phantomJsResponse));
        $response->setHeader('cookies', $phantomJsResponse->getCookies());
        return $response;
    }



    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }


    public function getStatusCode(): int
    {
        return (int) $this->status;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    public function getHeaders(bool $throw = true): array
    {
        return $this->headers;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * @param string $content
     */
    public function setContent(?string $content)
    {
        $this->content = (string) $content;
    }

    public function getContent(bool $throw = true): string
    {
        return $this->content;
    }

    public function toArray(bool $throw = true): array
    {
        return [];
    }

    public function cancel(): void
    {
    }

    /**
     * @inheritDoc
     */
    public function getInfo(?string $type = null): mixed
    {
    }
}
