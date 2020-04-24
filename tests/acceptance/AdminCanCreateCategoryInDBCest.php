<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class AdminCanCreateCategoryInDBCest
{
    public function testCreateCategoryInDatabase(AcceptanceTester $I)
    {
        // Arrange
        $I->amOnPage('/login');
        $I->fillField(['name' => 'username'], 'Keith');
        $I->fillField(['name' => 'password'], 'admin');
        $I->click('Sign in');

        $I->amOnPage('/');
        $I->click('Categories');

        $I->amOnPage('/category');
        $I->dontSee('Other');
        $I->click('Create new');

        $I->amOnPage('/category/new');

        $I->fillField('Title', 'Other');

        $I->click('Save');

        $I->amOnPage('/category');
        $I->seeInRepository('App\Entity\Category', [
            'title' => 'Other']);
    }
}
