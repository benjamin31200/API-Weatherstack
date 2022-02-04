<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ListCityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(ListCityRepository $listCityRepository, Security $security): Response
    {
        $security->getUser();
        return $this->render('list/index.html.twig', [
            'list' => $listCityRepository->findByUserId($security->getUser()->getId())
            
        ]);
    }
}
