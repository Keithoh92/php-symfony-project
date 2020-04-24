<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserLinksCest
{
    public function testUserPagesWorking(AcceptanceTester $I)
    {
        //Arrange
        $I->amOnPage('/login');

        //Act
        $I->fillField(['name' => 'username'], 'Jack');
        $I->fillField(['name' => 'password'], 'jack');
        $I->click('Sign in');

        $I->click('Auctions');
        $I->amOnPage('/auction');
        $I->see('Check winner', 'td');
        $I->see('Make Bid', 'td');


        $I->click('MyBids');
        $I->see('Item', 'th');
        $I->see('MyBid', 'th');
        $I->see('Previous bid', 'th');

    }
}
