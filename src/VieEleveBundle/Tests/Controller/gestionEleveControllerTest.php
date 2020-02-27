<?php

namespace VieEleveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class gestionEleveControllerTest extends WebTestCase
{
    public function testAddmenu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addmenu');
    }

    public function testReadmenu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/readmenu');
    }

    public function testUpdatemenu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updatemenu');
    }

    public function testDeletemenu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletemenu');
    }

    public function testAddtransport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'readtransportAction');
    }

    public function testUpdatetransport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updatetransport');
    }

    public function testDeletetransport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletetransport');
    }

}
