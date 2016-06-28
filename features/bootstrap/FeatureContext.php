<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }

    /**
     * @When I Can Do something
     */
    public function iCanDoSomething()
    {
        PHPUnit::assertEquals('.env.behat', app()->environmentFile());
    }

    /**
     * @When I visit index page
     */
    public function iVisitIndexPage()
    {
        $this->visit("/login");
        $this->printLastResponse();
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->visit("/blogs");  
        $this->printLastResponse();
    }


    /**
     * @Given I am on registration page
     */
    public function iAmOnRegistrationPage()
    {
        $this->visit("/register");  
    }
}
