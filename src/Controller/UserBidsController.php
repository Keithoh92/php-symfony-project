<?php

namespace App\Controller;

use App\Entity\UserBids;
use App\Form\UserBidsType;
use App\Repository\UserBidsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/bids")
 */
class UserBidsController extends AbstractController
{
    /**
     * @Route("/", name="user_bids_index", methods={"GET"})
     */
    public function index(UserBidsRepository $userBidsRepository): Response
    {
        return $this->render('user_bids/index.html.twig', [
            'user_bids' => $userBidsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_bids_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userBid = new UserBids();
        $form = $this->createForm(UserBidsType::class, $userBid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userBid);
            $entityManager->flush();

            return $this->redirectToRoute('user_bids_index');
        }

        return $this->render('user_bids/new.html.twig', [
            'user_bid' => $userBid,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_bids_show", methods={"GET"})
     */
    public function show(UserBids $userBid): Response
    {
        return $this->render('user_bids/show.html.twig', [
            'user_bid' => $userBid,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_bids_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserBids $userBid): Response
    {
        $form = $this->createForm(UserBidsType::class, $userBid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_bids_index');
        }

        return $this->render('user_bids/edit.html.twig', [
            'user_bid' => $userBid,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_bids_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserBids $userBid): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userBid->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userBid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_bids_index');
    }
}
