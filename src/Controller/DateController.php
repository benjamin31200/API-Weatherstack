<?php

namespace App\Controller;

use App\Entity\Date;
use App\Form\DateType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/date")
 */
class DateController extends AbstractController
{
    /**
     * @Route("/", name="date_index", methods={"GET"})
     */
    public function index(EventRepository $dateRepository): Response
    {
        return $this->render('date/index.html.twig', [
            'dates' => $dateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="date_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = new Date();
        $form = $this->createForm(DateType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($date);
            $entityManager->flush();

            return $this->redirectToRoute('date_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('date/new.html.twig', [
            'date' => $date,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="date_show", methods={"GET"})
     */
    public function show(Date $date): Response
    {
        return $this->render('date/show.html.twig', [
            'date' => $date,
        ]);
    }

    /**
     * @Route("/edit", name="date_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = new Date;
        $form = $this->createForm(DateType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('date/edit.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="date_delete", methods={"POST"})
     */
    public function delete(Request $request, Date $date, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$date->getId(), $request->request->get('_token'))) {
            $entityManager->remove($date);
            $entityManager->flush();
        }

        return $this->redirectToRoute('date_index', [], Response::HTTP_SEE_OTHER);
    }
}
