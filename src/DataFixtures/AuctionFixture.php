<?php

namespace App\DataFixtures;

use App\Entity\Auction;
use App\Entity\Bids;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuctionFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $sports = new Category();
        $sports->setTitle('Sports');

        $tv = new Category();
        $tv->setTitle("TV & Film");

        $misc = new Category();
        $misc->setTitle("Miscellaneous");


        $a1 = new Auction();
        $a1->setItem('Signed Liverpool Jersey');
        $a1->setQuantity(1);
        $a1->setCategory($sports);
        $a1->setCurrentBid(200);

        $a2 = new Auction();
        $a2->setItem('2002 World Cup Football');
        $a2->setQuantity(2);
        $a2->setCategory($sports);
        $a2->setCurrentBid(300);

        $a3 = new Auction();
        $a3->setItem('James Bond Suit(The World Never Dies');
        $a3->setQuantity(1);
        $a3->setCategory($tv);
        $a3->setCurrentBid(500);

        $a4 = new Auction();
        $a4->setItem('Declaration of Independence');
        $a4->setQuantity(1);
        $a4->setCategory($misc);
        $a4->setCurrentBid(1000);


        $manager->persist($sports);
        $manager->persist($tv);
        $manager->persist($misc);
        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);
        $manager->persist($a4);

        $manager->flush();
    }
}
