<?php

namespace App\Controller;

use App\Entity\CategoryHairstyle;
use App\Form\CategoryHairstyleType;
use App\Repository\CategoryHairstyleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoryHairstyleController extends AbstractController
{
    /**
     * @Route("/", name="category_hairstyle_index", methods={"GET"})
     */
    public function index(CategoryHairstyleRepository $categoryHairstyleRepository): Response
    {
        return $this->render('category_hairstyle/index.html.twig', [
            'category_hairstyles' => $categoryHairstyleRepository->findAll(),
        ]);
    }
}
