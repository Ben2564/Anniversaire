<?php

namespace App\Controller;

use App\Entity\Anniversaire;
use App\Form\AnniversaireType;
use App\Repository\AnniversaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/anniversaire")
 */
class AnniversaireController extends AbstractController
{
    /**
     * @Route("/", name="app_anniversaire_index", methods={"GET"})
     */
    public function index(AnniversaireRepository $anniversaireRepository): Response
    {
        return $this->render('anniversaire/index.html.twig', [
            'anniversaires' => $anniversaireRepository->findAnniv40Jours(),
        ]);
    }

    /**
     * @Route("/new", name="app_anniversaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AnniversaireRepository $anniversaireRepository): Response
    {
        $anniversaire = new Anniversaire();
        $form = $this->createForm(AnniversaireType::class, $anniversaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anniversaireRepository->add($anniversaire, true);

            return $this->redirectToRoute('app_anniversaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('anniversaire/new.html.twig', [
            'anniversaires' => $anniversaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_anniversaire_show", methods={"GET"})
     */
    public function show(Anniversaire $anniversaire): Response
    {
        return $this->render('anniversaire/show.html.twig', [
            'anniversaires' => $anniversaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_anniversaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Anniversaire $anniversaire, AnniversaireRepository $anniversaireRepository): Response
    {
        $form = $this->createForm(AnniversaireType::class, $anniversaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anniversaireRepository->add($anniversaire, true);

            return $this->redirectToRoute('app_anniversaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('anniversaire/edit.html.twig', [
            'anniversaires' => $anniversaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_anniversaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Anniversaire $anniversaire, AnniversaireRepository $anniversaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$anniversaire->getId(), $request->request->get('_token'))) {
            $anniversaireRepository->remove($anniversaire, true);
        }

        return $this->redirectToRoute('app_anniversaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
