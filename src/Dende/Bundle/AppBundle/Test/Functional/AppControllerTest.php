<?php
namespace Dende\Bundle\AppBundle\Test\Functional;

use Dende\Bundle\AppBundle\Test\BaseFunctionalTest;

/**
 * Class AppControllerTest
 * @package Dende\Bundle\AppBundle\Test\Functional
 */
class AppControllerTest extends BaseFunctionalTest
{
    /**
     * @test
     */
    public function list_renders_properly()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertEquals(200, $this->getStatusCode());

        $list = $crawler->filter("ul > li");

        $this->assertCount(3, $list);
        $this->assertContains("First task's title", $list->eq(0)->text());
        $this->assertContains("Second task's title", $list->eq(1)->text());
        $this->assertContains("Finished task", $list->eq(2)->text());

        $this->assertEquals(1, $crawler->filter("input[type=text]")->count());
        $this->assertEquals(1, $crawler->filter("button")->count());

        $this->assertEquals("todo.task_form.add.label", $crawler->filter("button")->text());

        $tasks = $this->getContainer()->get("dende_todo.repository.task")->findAll();

        $this->assertCount(5, $tasks);
    }

    /**
     * @test
     */
    public function i_can_add_new_task_to_list()
    {
        $crawler = $this->client->request('GET', '/');
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form')->first()->form();

        $form->setValues([
            "short_task[title]" => "my test task was added !!!"
        ]);

        $crawler = $this->client->submit($form);
        $this->assertEquals(200, $this->getStatusCode());
        $this->assertEquals('/', $this->client->getRequest()->getRequestUri());

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('todo.task_add.success', trim($alert->text()));

        $tasks = $this->getContainer()->get("dende_todo.repository.task")->findOneBy([
            "title" => "my test task was added !!!"
        ]);

        $this->assertNotNull($tasks);
        $this->assertEquals($tasks->title(), "my test task was added !!!");
    }
}
