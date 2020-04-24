<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class LoginAsAdminCest
{
    public function testLoginAsAdmin(AcceptanceTester $I)
    {
        //Arrange
        $I->amOnPage('/login');

        //Act
        $I->fillField(['name' => 'username'], 'Keith');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Sign in');

        //Assert
        $I->amOnPage('/');
        $I->seeLink('Admin');

        $I->click('Admin');
        $I->amOnPage('/admin');
        $I->seeLink('All Users');

    }
}
