<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class AdminCanCreateNewUserCest
{
    public function testCreateNewUserInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/login');
        $I->fillField(['name' => 'username'], 'Keith');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Sign in');

        $I->amOnPage('/');
        $I->click('Admin');

        $I->amOnPage('/admin');
        $I->click('New User Form');

        $I->amOnPage('/user/new');

        $I->fillField('Username', 'Jacob');
        $I->fillField('Password', 'user');

        $I->click('Save');

        $I->amOnPage('/user');
        $I->seeInRepository('App\Entity\User', [
            'username' => 'Jacob'
        ]);
    }
}
