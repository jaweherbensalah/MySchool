<?php

namespace VieEleveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class gestionDesAbonnementsControllerTest extends WebTestCase
{
    public function testRegisterrestaurant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registerRestaurant');
    }

    public function testListabonnesrestaurant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listAbonnesRestaurant');
    }

    public function testRegistertransport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registerTransport');
    }

    public function testListabonnestransport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listAbonnesTransport');
    }

}
