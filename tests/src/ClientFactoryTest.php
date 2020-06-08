<?php

namespace ByTIC\GouttePhantomJs\Tests;

use ByTIC\GouttePhantomJs\Clients\ClientFactory;
use ByTIC\GouttePhantomJs\Clients\PhantomJs\ClientBridge;
use Goutte\Client;

/**
 * Class ClientFactoryTest
 * @package ByTIC\GouttePhantomJs\Tests
 */
class ClientFactoryTest extends AbstractTest
{
    public function testGetGenericClient()
    {
        $client = ClientFactory::getGenericClient();

        self::assertInstanceOf(Client::class, $client);
    }
}
