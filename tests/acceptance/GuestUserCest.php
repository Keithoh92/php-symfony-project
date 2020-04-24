<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class GuestUserCest
{
    public function testGuestPagesWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeLink('Login');
        $I->seeLink('Register');

    }

    public function testGuestHomepageDoesntSee(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->dontSeeLink('Admin');
        $I->dontSeeLink('MyBids');
    }
    public function testGuestAuctionsPageDoesntSee(AcceptanceTester $I)
    {
        $I->amOnPage('/auction');
        $I->dontSee('Check Winner', 'td');
        $I->dontSee('Make Bid', 'td');
    }
}
