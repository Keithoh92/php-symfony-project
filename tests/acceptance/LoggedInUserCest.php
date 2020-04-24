<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class LoggedInUserCest
{
    public function testUserLoginWorking(AcceptanceTester $I)
    {
        //Arrange
        $I->amOnPage('/login');

        //Act
        $I->fillField(['name' => 'username'], 'Jack');
        $I->fillField(['name' => 'password'], 'jack');
        $I->click('Sign in');

        //Assert
        $I->amOnPage('/');
        $I->seeLink('MyBids');
    }

}
