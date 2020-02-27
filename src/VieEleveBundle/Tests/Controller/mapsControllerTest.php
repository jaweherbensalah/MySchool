<?php

namespace VieEleveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class mapsControllerTest extends WebTestCase
{
    public function testMaps()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/maps');
    }

}
