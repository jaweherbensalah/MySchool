<?php

namespace VieEleveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class highchartControllerTest extends WebTestCase
{
    public function testChart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chart');
    }

}
