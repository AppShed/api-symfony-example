<?php

namespace AppShed\Extensions\RedmineBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/projects');
    }

    public function testProject()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/projects/:id');
    }

}
