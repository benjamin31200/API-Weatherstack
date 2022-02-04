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
     * @Route("/new", name="date_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = new Date();
        $createDate = $this->createForm(DateType::class, $date);
        $createDate->handleRequest($request);

        if ($createDate->isSubmitted() && $createDate->isValid()) {
            $entityManager->persist($date);
            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('date/new.html.twig', [
            'date' => $date,
            'createDate' => $createDate,
        ]);
    }
}
