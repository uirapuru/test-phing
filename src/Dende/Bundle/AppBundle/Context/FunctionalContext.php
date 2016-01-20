<?php
namespace Dende\Bundle\AppBundle\Context;

use Behat\MinkExtension\Context\MinkContext;

class FunctionalContext extends MinkContext
{
    /**
     * @Given /^I will fill form with new task name: "([^"]*)"$/
     */
    public function iWillFillFormWithNewTaskName($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I will submit the form$/
     */
    public function iWillSubmitTheForm()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I can see "([^"]*)" alert$/
     */
    public function iCanSeeAlert($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^there is "([^"]*)" on the list$/
     */
    public function thereIsOnTheList($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I am on path "([^"]*)"$/
     */
    public function iAmOnPath()
    {
        file_put_contents("/tmp/test.png", $this->getSession()->getScreenshot());

    }
}
