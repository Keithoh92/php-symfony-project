<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Auction;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;


class BidController extends AbstractController
{
    /**
     * @Route("/bid", name="bid_index")
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        return $this->render('bid/index.html.twig', [
            'controller_name' => 'BidController',
        ]);
    }
    /**
     * @Route("/bid", name="bid_clear")
     */
    public function clear()
    {
        $session = new Session();
        $session->remove('Bid');

        return $this->redirectToRoute('bid_index');
    }

    /**
     * @Route("/add/{id}", name="bid_add")
     */
    public function makeBid(Auction $auction)
    {

        $auctions = [];

        $session = new Session();
        if($session->has('bids')){
            $auctions = $session->get('bids');
        }

        $id = $auction->getId();

        if(!array_key_exists($id, $auctions)){
            $auctions[$id] = $auction;

            $session->set('bids', $auctions);
        }
//        $auctionRepository = $this->getDoctrine()->getManager('App:Auction');
        $currentBid1 = $auction->getCurrentBid();
        $currentBid1 = $auction->setCurrentBid($currentBid1 += 50);
        $em = $this->getDoctrine()->getManager();
        $em->persist($currentBid1);
        $em->flush();

//        $id = $this->getUser();
//        $id = $this->getParameter('myBids');
        return $this->redirectToRoute('bid_index');
    }
//    public function fooAction(UserInterface $user)

    /**
     * @Route("/delete/{id}", name="bid_delete")
     */
    public function deleteAction(int $id)
    {
        $auctions =[];
        $session = new Session();
        if($session->has('bids')){
            $auctions = $session->get('bids');
        }

        if(array_key_exists($id, $auctions)){
            unset($auctions[$id]);

            if(sizeof($auctions) < 1){
                return $this->redirectToRoute('bid_clear');
            }
            $session->set('bids', $auctions);
        }
        return $this->redirectToRoute('bid_index');
    }
}
