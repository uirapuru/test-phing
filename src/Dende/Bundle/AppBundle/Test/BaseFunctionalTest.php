<?php
namespace Dende\Bundle\AppBundle\Test;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Client;

abstract class BaseFunctionalTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var Container
     */
    protected $container;

    public function setUp()
    {
        parent::setUp();

        $this->loadFixtures([
            "Dende\Bundle\AppBundle\DataFixtures\ORM\TasksData",
            "Dende\Bundle\AppBundle\DataFixtures\ORM\TodoListsData",
        ]);

        $this->client = static::makeClient();
        $this->client->followRedirects(true);
    }

    protected function getContent()
    {
        return $this->client->getResponse()->getContent();
    }

    protected function getStatusCode()
    {
        return $this->client->getResponse()->getStatusCode();
    }
}
