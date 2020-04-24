<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class AuctionPageCest
{
    public function testAuctionPageWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/auction');
        $I->see('Auctions', 'h1');

    }

    public function testAuctionPageTableHeadings(AcceptanceTester $I)
    {
        $I->amOnPage('/auction');
        $I->see('Start Date', 'th');
        $I->see('Item', 'th');
        $I->see('Quantity', 'th');
        $I->see('Category', 'th');
        $I->see('Current Bids', 'th');
        $I->see('Status', 'th');
    }
}
