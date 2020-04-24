<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class CategoryPageCest
{
    public function testCategoryPageWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/category');
        $I->see('Category index', 'h1');

    }

    public function testCategoryPageTableHeadings(AcceptanceTester $I)
    {
        $I->amOnPage('/category');
        $I->see('Title', 'th');
    }
}
