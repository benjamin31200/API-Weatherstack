<?php

namespace App\Controller;

use App\Entity\ListCity;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $listCity = new ListCity;
        $getUser = $this->getUser();
        $form = $this->createForm(UserType::class, $getUser);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        if (isset($_POST['addCities']) and !empty($_POST['addCities'])) {
            $recherche = htmlspecialchars($_POST['addCities']);
            $listCity->setCities($recherche);
            $listCity->setUser($this->getUser());
            $entityManager->persist($listCity);
            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('homepage/homepage.html.twig', [
            'user' => $getUser,
            'form' => $form->createView(),
        ]);
    }
}
