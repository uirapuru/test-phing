<?php
namespace Dende\Bundle\AppBundle\Context;

use Behat\MinkExtension\Context\MinkContext;
use Closure;
use Exception;

class DiagnozaContext extends MinkContext
{
    /**
     * @Then /^I press login out button$/
     */
    public function iPressLoginOutButton()
    {
        $script = '$("div.close").trigger("click")';
        $this->getMink()->getSession()->evaluateScript($script);
    }

    /**
     * @param $lambda
     * @return bool
     */
    public function spin (Closure $lambda)
    {
        while (true)
        {
            try {
                if ($lambda($this)) {
                    return true;
                }
            } catch (Exception $e) {
                // do nothing
            }

            usleep(300);
        }
    }

    /**
     * @Given /^I wait to see "([^"]*)"$/
     */
    public function iWaitToSee($needle)
    {
        $page = $this->getSession()->getPage();

        if($this->spin(function(MinkContext $context) use ($page, $needle) {
            return (bool) strstr($page->getText(), $needle);
        })) {
            return;
        }

        throw new Exception(sprintf("Text '%s' not found on page.", $needle));
    }
}
