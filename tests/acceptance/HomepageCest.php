<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class HomepageCest
{
    public function testHomepageWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('This is the home of charity auctions Ireland', 'p');
        //$I->seeLink('auctions');
    }

    public function testHomePageLinks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Auctions');
        $I->seeInCurrentUrl('/auction');
        $I->see('auction');
    }
}


