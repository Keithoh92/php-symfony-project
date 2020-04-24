<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class AdminCanCreateInDatabaseCest
{
    public function testCreateRecordsInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/login');
        $I->fillField(['name' => 'username'], 'Keith');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Sign in');

//        $I->seeInRepository('App\Entity\Auction', [
//            ''
//        ]);

        $I->amOnPage('/');
        $I->click('Auctions');

        $I->amOnPage('/auction');
        $I->dontSee('Michael Jordan Basketball jersey 1996');
        $I->click('Create new');

        $I->amOnPage('/auction/new');

        $I->fillField('Item', 'Michael Jordan Basketball jersey 1996');
        $I->fillField('Quantity', 1);
        $I->selectOption('Category', 'Sports');
        $I->fillField('Current bid', 100);
//        $I->fillField('Start date time', 'Apr-23-2020', '12-00');
//
//        $I->fillField('Deadline', 'Apr-25-2020', '12-00');
        $I->click('Save');

        $I->amOnPage('/auction');
        $I->seeInRepository('App\Entity\Auction', [
            'item' => 'Michael Jordan Basketball jersey 1996']);


    }
}
