<?php //namespace App\Tests;
//use App\Tests\AcceptanceTester;
//use Codeception\Util\Locator;
//
//class UserSubmitNewBidCest
//{
//    public function testBidSubmitIsSavedToDB(AcceptanceTester $I)
//    {
//        //Arrange
//        $I->amOnPage('/login');
//
//        //Act
//        $I->fillField(['name' => 'username'], 'Jack');
//        $I->fillField(['name' => 'password'], 'jack');
//        $I->click('Sign in');
//
//        $I->click('Auctions');
//        $I->amOnPage('/auction');
//
//        $I->cantSeeInRepository('App\Entity\UserBids', [
//            'mybid' => 85
//        ]);
//
//        $I->fillField(Locator::elementAt('form input[type=number]', '//table/tbody/tr/td', 10), 85);
//        $I->click('Submit');
//
//        $I->seeInRepository('App\Entity\UserBids', [
//            'mybid' => 85
//        ]);
//
//
//    }
//}
