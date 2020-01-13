<?php

namespace App\Controller;

use App\Entity\ModelHairstyle;
use App\Entity\CategoryHairstyle;
use App\Form\ModelHairstyleType;
use App\Repository\ModelHairstyleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Route("/hairstyle")
 */
class ModelHairstyleController extends AbstractController
{
    /**
    * @var ModelHairstyleRepository
    */
    private $repository;


    public function __construct(ModelHairstyleRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/category/{category_id}", name="model_hairstyle_index", methods={"GET"}, requirements={"category_id"="\d+"})
     */
    public function index($category_id): Response
    {
        $category_coif = $this->getDoctrine()->getRepository(CategoryHairstyle::class)->find($category_id);
        $coiffures = $category_coif->getModelHairstyles();

        return $this->render('model_hairstyle/index.html.twig', [
            'coiffures' => $coiffures,
            'category_coif' => $category_coif,
        ]);
    }

    /**
     * @Route("/model/new", name="model_hairstyle_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $modelHairstyle = new ModelHairstyle();
        $form = $this->createForm(ModelHairstyleType::class, $modelHairstyle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $modelFile = $form['picture']->getData();
            if ($modelFile) {
                $modelFileName = $fileUploader->upload($modelFile);
                $modelHairstyle->setPicture($modelFileName);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modelHairstyle);
            $entityManager->flush();
            $this->addFlash('success', 'Coiffure crée avec succès');

            return $this->redirectToRoute('category_hairstyle_index');
        }

        return $this->render('model_hairstyle/new.html.twig', [
            'model_hairstyle' => $modelHairstyle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/model/{id}", name="model_hairstyle_show", methods={"GET"})
     */
    public function show(ModelHairstyle $modelHairstyle): Response
    {
        return $this->render('model_hairstyle/show.html.twig', [
            'coiffure' => $modelHairstyle,
        ]);
    }

    /**
     * @Route("/model/{id}/edit", name="model_hairstyle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ModelHairstyle $modelHairstyle,FileUploader $fileUploader): Response
    {
        $newFile =  new File($this->getParameter('Illustration_Modele').'/'.$modelHairstyle->getPicture()) ;
        $modelHairstyle->setPicture($newFile);

        $form = $this->createForm(ModelHairstyleType::class, $modelHairstyle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $modelFile = $form['picture']->getData();
            if ($modelFile) {
                $newFilename = $fileUploader->upload($modelFile);
                $modelHairstyle->setPicture($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Coiffure modifié avec succès');

            return $this->redirectToRoute('category_hairstyle_index');
        }

        return $this->render('model_hairstyle/edit.html.twig', [
            'model_hairstyle' => $modelHairstyle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/model/{id}", name="model_hairstyle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ModelHairstyle $modelHairstyle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelHairstyle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modelHairstyle);
            $entityManager->flush();
            $this->addFlash('success', 'Cette coiffure a été supprimé avec succès');
        }

        return $this->redirectToRoute('category_hairstyle_index');
    }
}
