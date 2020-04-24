<?php

namespace App\Controller;

use App\Entity\Auction;
use App\Entity\UserBids;
use App\Form\AuctionType;
use App\Repository\AuctionRepository;
use App\Repository\UserBidsRepository;
use mysql_xdevapi\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;


/**
 * @Route("/auction")
 */
class AuctionController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    private function getDateFromSession()
    {
        $default = $today = new \DateTime('NOW'); // today
        $dateFromSession = $this->session->get('today', $default);

        return $dateFromSession;
    }

    private function setDateInSession($date)
    {
        $this->session->set('today', $date);
    }

    /**
     * @Route("/dateToday", name="auction_date_today", methods={"GET"})
     */
    public function dateToday(): Response
    {
        $newDate = new \DateTime('NOW');
        $this->setDateInSession($newDate);
        return $this->redirectToRoute('auction_index');
    }

    /**
     * @Route("/{id}/userBids", name="auction_bid", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function processBid(Auction $auction): Response
    {

        $newBid = filter_input(INPUT_POST, 'newBid');

        $user = $this->getUser();

        $item = $auction->getItem();
        $currentBid = $auction->getCurrentBid();

        $userBids = new UserBids();
        $userBids->setBidItem($item);
        $userBids->setCurrentbid($currentBid);
        $userBids->setMybid($newBid);
        $userBids->setBidder($user);
        $currentBid = $auction->setCurrentBid($currentBid + $newBid);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($userBids);
        $entityManager->persist($currentBid);
        $entityManager->flush();

        return $this->redirectToRoute('auction_index');
    }
    /**
     * @Route("/{id}/userBids", name="auction_winner", methods={"GET"})
     */
    public function checkWinner(Auction $auction, UserBidsRepository $repository): Response
    {
       $item = $auction->getItem();


        $userBidsRepository = $this->getDoctrine()->getRepository('App:UserBids');
        $userBids = $userBidsRepository->findAll($item);
        ;

        //$userRepository = $this->getDoctrine()->getRepository(UserBids::class);
//        $userBids = $repository->findOneBySomeField($item);


        $template = 'auction/winner.html.twig';
        $args = [
            'userBids' => $userBids
    ];
        return $this->render($template, $args);
    }


    /**
     * @Route("/", name="auction_index", methods={"GET"})
     */
    public function index(AuctionRepository $auctionRepository): Response
    {

        // ensure a date in session ...
        $date = $this->getDateFromSession();
        $this->setDateInSession($date);


        return $this->render('auction/index.html.twig', [
            'auctions' => $auctionRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="auction_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $auction = new Auction();
        $form = $this->createForm(AuctionType::class, $auction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auction);
            $entityManager->flush();

            return $this->redirectToRoute('auction_index');
        }

        return $this->render('auction/new.html.twig', [
            'auction' => $auction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="auction_show", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function show(Auction $auction): Response
    {
        return $this->render('auction/show.html.twig', [
            'auction' => $auction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="auction_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Auction $auction): Response
    {
        $form = $this->createForm(AuctionType::class, $auction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auction_index');
        }

        return $this->render('auction/edit.html.twig', [
            'auction' => $auction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="auction_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Auction $auction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($auction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('auction_index');
    }
    

}
