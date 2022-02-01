<?php

namespace App\Controller;

use App\Entity\City;
use App\Form\City1Type;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class CityController extends AbstractController
{
    /**
     * @Route("/", name="city_index", methods={"GET", "POST"})
     */
    public function index(CityRepository $cityRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $city = new City();
        $form = $this->createForm(City1Type::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($city);
            $entityManager->flush();

            return $this->redirectToRoute('city_edit',['id' => 1], Response::HTTP_SEE_OTHER);
        }

        return $this->render('city/index.html.twig', [
            'cities' => $cityRepository->find(1),
            'city' => $city,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="city_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, City $city, EntityManagerInterface $entityManager, CityRepository $cityRepository): Response
    {
        $form = $this->createForm(City1Type::class, $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('city_edit', ['id' => 1], Response::HTTP_SEE_OTHER);
        }

        return $this->render('city/edit.html.twig', [
            'city' => $cityRepository->find(1),
            'city' => $city,
            'form' => $form->createView(),
        ]);
    }
}
