<?php

namespace VieEleveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class gestionPaiementControllerTest extends WebTestCase
{
    public function testFacturescolarite()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/factureScolarite');
    }

    public function testPrixscolarite()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/prixScolarite');
    }

    public function testPreparepaiement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/preparePaiement');
    }

}
